<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Negara;
use Storage;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
    {
        $this->middleware('auth')->except('index','contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(4);
        $category = Category::all();
        $tags = Tag::all();
        $negara = Negara::all();
        return view('index', compact('posts','negara','category','tags'));
    }

    
    
}
