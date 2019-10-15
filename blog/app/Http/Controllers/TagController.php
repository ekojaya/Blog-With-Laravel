<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;
use App\Negara;
use Auth;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->paginate(4);
        $posts = Post::all();
        $category = Category::all();
        $negara = Negara::all();
        $user = Auth::user();
        return view('tags.index',compact('tags','posts','category','negara','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role==1){
            abort(404);
        }
         $tags= Tag::all();
         $category= Category::all();
        return view('tags.create',compact('tags','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role==1){
            abort(404);
        }
    
        $request->validate([
        'name'=> 'required',
        ]);
        $tags = new Tag;
        $tags ->name= $request->name;

        $tags->save();
        return back()->withInfo('Tags Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::paginate(4);
        $tags2 = Tag::find($id);
        $posts = Post::all();
        $negara = Negara::all();
        $category = Category::paginate(4);
        $user = Auth::user();
        return view('tags.show', compact('posts','tags','category','tags2','negara','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role==1){
            abort(404);
        }
       $tags =Tag::find($id);
       return view('tags.edit',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if(Auth::user()->role==1){
            abort(404);
        }

        $request->validate([
        'name'=>'required',
        ]);
        $tags= Tag::find($id);
        $tags->name = $request->name;
        $tags->save();
        return back()->withInfo('Berhasil Di edit Tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role==1){
            abort(404);
        }
        $tags= Tag::find($id);
        $tags->delete();
        return back()->withInfo('berhasil di hapus');
    }
}
