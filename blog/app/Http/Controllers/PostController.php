<?php

namespace App\Http\Controllers;

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
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show','indexApi','showAPI');
    }
    public function index()
    {
        
        $category= Category::all();
        $negara = Negara::all();
        $posts=Post::orderBy('id','desc')->paginate(4);
        $user = Auth::user();
        $tags=Tag::all();
        return view('blog.index', compact('posts','negara','category','tags','user'));
    }
    
    public function allpost()
    {
        if(Auth::user()->role==1){
            abort(404);
        }
        $category= Category::orderBy('id','desc')->paginate(4);
        $posts=Post::orderBy('id','desc')->paginate(4);
        $tags=Tag::orderBy('id','desc')->paginate(4);
        $negara = Negara::orderBy('id','desc')->paginate(4);
        return view('blog.allpost', compact('posts','negara','category','tags'));
    }

    public function comment1()
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
        return view('comment.show', compact('posts','negara','category','tags','user','comments'));
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
        $category= Category::all();
        $posts=Post::all();
        $tags=Tag::all();
        $negara = Negara::all();
        return view('blog.create', compact('posts','negara','category','tags'));
     
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
        'title' => 'required|min:5',
        'category_id'=>'required',
        'tags'=>'required',
        'content'=>'required',
        'negara_id'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',

        ]);
        $posts = new Post;
        $posts->title = $request->title;
        $posts->slug = str_slug($posts->title);
        $posts->content = $request->content;
        $posts->negara_id = $request->negara_id;
        $posts->category_id = $request->category_id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath,$fileName);
            $posts->image = $fileName;
        }
        
        $posts->save();
        $posts->tags()->sync($request->tags);
        return back()->withInfo('Succes bro');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $category= Category::all();
       $tags= Tag::paginate(4);
       $negara = Negara::all();
       $post = Post::where('slug','=',$slug)->first();
       $posts=Post::orderBy('id','desc')->paginate();
       $user = Auth::user();
       return view('blog.show',compact('post','posts','category','tags','negara','user'));
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
        $posts = Post::find($id);
        $category = Category::all();
        $tags = Tag::all();
        $negara = Negara::all();
        return view('blog.edit',compact('posts','category','tags','negara'));
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
        'title' => 'required|min:5',
        'category_id'=>'required',
        'tags'=>'required',
        'content'=>'required',
        'negara_id'=>'required',
        


        ]);
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->slug = str_slug($posts->title);
        $posts->content = $request->content;
        $posts->negara_id = $request->negara_id;
        $posts->category_id = $request->category_id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath,$fileName);

            $oldFilename = $posts->image;
            \Storage::delete($oldFilename);

            $posts->image = $fileName;
        }

        $posts->save();
        $posts->tags()->sync($request->tags);
        return back()->withInfo('Succes bro update');
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
        $posts= Post::find($id);
        Storage::delete($posts->image);
        $posts->tags()->detach();
        $posts->comments()->delete();
        $posts->delete();
        return back()->withInfo('berhasil di hapus');
    }

    // public function indexApi (){

        
    public function indexApi()
    {
         try {

                if (! $user = JWTAuth::parseToken()->authenticate()) {
                        return response()->json(['user_not_found'], 404);
                }

            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                    return response()->json(['token_expired'], $e->getStatusCode());

            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return response()->json(['token_invalid'], $e->getStatusCode());

            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return response()->json(['token_absent'], $e->getStatusCode());

            }
            $data = Post::all();
            if (count($data)>0){
                $res['message']="seccess!";
                $res['values']=$data;
                return response()->json($res);
            }else{
                $res['message']='empty!';
                return response()->json($res);
            }
    }

    public function showAPI($id)
    {
        

         $data = Kontak::where('id',$id)->get();
        if (count($data)>0){
            $res['message']="seccess!";
            $res['values']=$data;
            return response()->json($res);
        }else{
            $res['message']='empty!';
            return response()->json($res);
        }
    }


}
