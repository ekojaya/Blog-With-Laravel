<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use App\Negara;
use Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    #sblum masuk halaman create harus login dulu
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $posts= Post::all();
        $category= Category::orderBy('id','desc')->paginate(4);
        $tags =tag::all();
        $negara = Negara::all();
        $user = Auth::user();
        return view('category.index',compact('posts','category','tags','negara','user'));
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

        $posts= Post::all();
        $category= Category::all();

        

        return view('category.create',compact('posts','category'));
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
        'name' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        
        $category->save();
        return back()->withInfo('category Succes bro');
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
        $category2 = Category::find($id);
        $tags2 =Tag::find($id);
        $posts = Post::all();
        $negara = Negara::all();
        $user = Auth::user();
        $category = Category::paginate(4);
        return view('category.show', compact('posts','tags','category','category2','tags2','negara','user'));
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

        $category = Category::find($id);
   
        return view('category.edit',compact('category'));
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
            'name' => 'required',
            

        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        
        $category->save();
        return back()->withInfo('Succes bro update category');
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
        $category = Category::find($id);
        $category->delete();
        return back()->withInfo("katgori berhasil dihapus");
    }
}
