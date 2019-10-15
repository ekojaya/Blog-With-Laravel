<?php

namespace App\Http\Controllers;


use App\pesan1;
use Illuminate\Http\Request;
use App\Post;
use App\Tag; 
use App\Category;
use App\Negara;
use Storage;
use Auth;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class pesan1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $posts=Post::all();
        $category = Category::all();
        $tags = Tag::all();
        $negara = Negara::all();
        $user = Auth::user();
        return view('contact.create', compact('posts','negara','category','tags','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'email'=>'required',
        'nohp'=>'required',
        'pesan'=>'required',
        

        ]);
        $pesan = new pesan1;
        $pesan->name = $request->name;
        $pesan->email = $request->email;
        $pesan->nohp = $request->nohp;
        $pesan->pesan = $request->pesan;
        $pesan->save();
        return back()->withInfo('Succes bro');
        
    }
    public function allpesan()
    {
        if(Auth::user()->role==1){
            abort(404);
        }
        $category= Category::all();
        $posts=Post::all();
        $tags=Tag::all();
        $negara = Negara::all();
        $user = Auth::user();
        $comments = Comment::all();
        $pesan1 = pesan1::all();
        return view('contact.allpesan', compact('pesan1','posts','negara','category','tags','user','comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        $pesan1= pesan1::find($id);
        Storage::delete($pesan1->image);
    
        $pesan1->delete();
        return back()->withInfo('berhasil di hapus');
    }
}
