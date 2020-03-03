<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HelloController extends Controller
{
    public function contact(){
    	return view('pages.contact');
    }

    public function about(){
    	return view('pages.about');
    }

    public function index(){
    	$posts = DB::table('posts')->join('cetegories','posts.cetegories_id','cetegories.id')
    		->select('posts.*','cetegories.name','cetegories.slug')->paginate(3);
    		return view('pages.index', compact('posts'));
    }

}
