<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Negara;
use Storage;
use Auth;
class home_cont extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $posts=Post::orderBy('id','desc')->paginate();
        $user = Auth::user();
        return view('index', compact('posts','user'));
    }
    public function contact()
    {
       
        $posts=Post::orderBy('id','desc')->paginate();
        $user = Auth::user();
        return view('contact', compact('posts','user'));
    }
   
}
