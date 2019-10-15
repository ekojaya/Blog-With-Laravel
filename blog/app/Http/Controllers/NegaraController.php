<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use App\Negara;
use Auth;
class NegaraController extends Controller
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
        $posts= Post::all();
        $category= Category::all();
        $tags =tag::all();
        $user = Auth::user();
        $negara = Negara::orderBy('id','desc')->paginate(4);
        return view('negara.index',compact('posts','category','tags','negara','user'));
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
        $negara= Negara::all();
        return view('negara.create',compact('posts','negara'));
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

        $negara = new Negara;
        $negara->name = $request->name;
        
        $negara->save();
        return back()->withInfo('negara Succes bro');
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
        $category = Category::paginate(4);
        $negara2 = Negara::find($id);
        $negara = Negara::paginate(4);
        $user = Auth::user();
        return view('negara.show', compact('posts','tags','category','category2','tags2','negara2','negara','user'));
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
       $negara = Negara::find($id);
       return view('negara.edit',compact('negara'));
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
        $negara = Negara::find($id);
        $negara->name = $request->name;
        
        $negara->save();
        return back()->withInfo('Succes bro update Negara');
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
        $negara = Negara::find($id);
        $negara->delete();
        return back()->withInfo("Negara berhasil dihapus");
    }
}
