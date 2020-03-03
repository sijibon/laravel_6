<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CetegoryController extends Controller
{
    public function addCetegory(){
    	return view('post.addCetegory');
    }


    public function StoreCetegory(Request $request){

    	$validatedData = $request->validate([
        'name' => 'required|unique:cetegories|max:25|min:4',
        'slug' => 'required|unique:cetegories|max:25|min:4',
    	]);


    	$data = array();
    	$data ['name'] = $request->name;
    	$data ['slug'] = $request->slug;
    	$cetegory = DB::table('cetegories')->insert($data);

    	if ($cetegory) {

    		$notification = array(
    			'message'=> 'Successfully Cetegory Inserted',
    			'alert-type'=>'Success'
    		);

    		return Redirect()->back()->with($notification);

    	}else{
    		$notification = array(
    		'message'=>'Something went wrong!',
    		'alert-type'=>'error'

    		);

    		return Redirect()->back()->with($notification);

    	}

    }

    //All cetegories Method

    public function AllCetegories(){

    	$cetegories = DB::table('cetegories')->get();
    	return view('post.allcetegory', compact('cetegories'));

    }

    public function ViewCetegories($id){
    		$cetegories = DB::table('cetegories')->where('id', $id)->first();

    		return view('post.Cetegories_view')->with('cat',$cetegories);
    }

    public function DeleteCetegories($id){
    	$cetegories = DB::table('cetegories')->where('id',$id)->delete();

    	$notification = array(
    			'message'=> 'Successfully Cetegory Deleted',
    			'alert-type'=>'Success'
    		);
    	return Redirect()->back()->with($notification);

    }

    public function EditCetegories($id){
    	$cetegories = DB::table('cetegories')->where('id', $id)->first();
    	return view('post.editcetegories', compact('cetegories'));
    }

    public function UpdateCetegories(Request  $request , $id){

    	$validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug' => 'required|max:25|min:4',
    	]);


    	$data = array();
    	$data ['name'] = $request->name;
    	$data ['slug'] = $request->slug;
    	$cetegory = DB::table('cetegories')->where('id', $id)->update($data);

    	if ($cetegory) {

    		$notification = array(
    			'message'=> 'Successfully Cetegory Updated',
    			'alert-type'=>'Success'
    		);

    		return Redirect()->back()->with($notification);

    	}else{
    		$notification = array(
    		'message'=>'Nothing to update!',
    		'alert-type'=>'error'

    		);

    		return Redirect()->route( 'allcetegory' )->with($notification);
    		

    	}
    }
}