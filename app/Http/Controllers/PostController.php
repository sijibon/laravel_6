<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function writepost(){ 
    $cetegory = DB::table('cetegories')->get();
    return view('post.writepost', compact('cetegory'));
    }

    public function StorePost(Request $request){


    	$validatedData = $request->validate([
        'title' => 'required|max:200|',
        'details' => 'required',
        'image' => 'required | mimes:jpeg,jpg,png,gif,PNG | max:10000',

    	]);

    	$data = array();
    	$data ['title'] = $request->title;
    	$data ['cetegories_id'] = $request->cetegories_id;
    	$data ['details'] = $request->details;
    	$image = $request->file('image');
    	if ($image) {
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_name = hexdec(uniqid()).".".$ext;
    		$image_url = $image->move("frontend/image/",$image_name);
    		$data ['image'] = $image_url;
    		DB::table('posts')->insert($data);
    		return Redirect()->route('all.post');
    		
    	}else{
    		DB::table('posts')->insert($data);
    		return Redirect()->route('all.post');

    	}
	
    }

    public function AllPost(){
    	$posts = DB::table('posts')
    	->join('cetegories','posts.cetegories_id','cetegories.id')
    	->select('posts.*','cetegories.name')
    	->get();
    	return view('post.allpost', compact('posts'));

    }

    public function ViewPost($id){
    	$posts = Db::table('posts')
    	->join('cetegories','posts.cetegories_id','cetegories.id')
    	->select('posts.*','cetegories.name')
    	->where('posts.id', $id)
    	->first();
    	return view('post.viewpost', compact('posts'));
    }


    public function EditPosts($id){
    	$cetegory = DB::table('cetegories')->get();
    	$posts = DB::table('posts')->where('id' , $id)->first();
    	return view('post.editpost', compact('cetegory','posts'));
    }


    public function UpdatePosts(Request $request,$id){
    	$validatedData = $request->validate([
        'title' => 'required|max:200|',
        'details' => 'required',
        'image' => 'mimes:jpeg,jpg,png,gif,PNG | max:10000',

    	]);

    	$data = array();
    	$data ['title'] = $request->title;
    	$data ['cetegories_id'] = $request->cetegories_id;
    	$data ['details'] = $request->details;
    	$image = $request->file('image');
    	if ($image) {
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_name = hexdec(uniqid()).".".$ext;
    		$image_url = $image->move("public/frontend/image/",$image_name);
    		$data ['image'] = $image_url;
    		unlink($request->old_image);
    		DB::table('posts')->where('id',$id)->update($data);
    		return Redirect()->route('all.post');

    		
    	}else{
    		$data ['image'] = $request->old_image;
    		DB::table('posts')->where('id',$id)->update($data);
    		return Redirect()->route('all.post');

    	}
    }

    public function DeletePosts($id){
    		$posts = DB::table('posts')->where('id', $id)->first();
    		$image = $posts->image;
    		unlink($image);
    		$delete = DB::table('posts')->where('id', $id)->delete();
    		return Redirect()->route('all.post');
    }
}
