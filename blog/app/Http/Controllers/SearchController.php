<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Negara;
class SearchController extends Controller
{
    public function search(Request $request){
    	$q =$request->input('search'); 
    	$posts = Post::where('title','LIKE','%'.$q.'%')->get();
    	$category = Category::all();
    	$tags = Tag::all();
    	$negara= Negara::all();
    	return view('search.result',['posts'=>$posts],compact('category','posts','tags','negara'));
    }
}
