<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\Negara;
use Storage;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show','indexR','loginR','storeR','showR' );
    }
    public function index()
    {
     $user = Auth::user();
       $category= Category::all();
       $tags= Tag::paginate(4);
       $negara = Negara::all();
       $posts = Post::all();

       return view('user.show',compact('posts','category','tags','negara','user'));
    }
    public function alluser()
    {
        if(Auth::user()->role==1){
            abort(404);
        }

       $user = User::get();
       $category= Category::all();
       $tags= Tag::paginate(4);
       $negara = Negara::all();
       $posts = Post::all();

       return view('user.index',compact('posts','category','tags','negara','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
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
         $user = User::find($id);
       return view('user.edit',compact('user'));
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
        'name'=>'required|min:3',
        'email'=>'required|string|email|max:255',
        'image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        'kota_asal'=>'required|min:3',
        'favo_food'=>'required|min:3',
        'favo_place'=>'required|min:3',

        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->kota_asal = $request->kota_asal;
        $user->favo_food = $request->favo_food;
        $user->favo_place = $request->favo_place;

          if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath,$fileName);

            $oldFilename = $user->image;
            \Storage::delete($oldFilename);

            $user->image = $fileName;
        }

        $user->save();
        
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
        $user = Auth::user();
        Storage::delete($user->image);
      
        $user->delete();
        return back()->withInfo('berhasil di hapus');
    }

     /**
     * Restful API
     *
     */
    public function indexR (){

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

            $data = User::all();
            if (count($data)>0){
                $res['message']="seccess!";
                $res['values']=$data;
                return response()->json($res);
            }else{
                $res['message']='empty!';
                return response()->json($res);
            }
    }

     public function loginR(Request $request){
        $credentials = $request->only('email', 'password');

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }


            return response()->json(compact('credentials','token'));

    }
    public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255', 
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);
             if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
            }

            $name= $request->Input('name');
            $email = $request->Input('email');
            $password = $request->Input('password');
            
            $data = New User;
            $data->name = $name;
            $data->email = $email;
            $data->password = bcrypt($password);
            $token = JWTAuth::fromUser($data);

            if($data->save()){
                $res['message']="Success!";
                $res['value']="$data";
                $res['token']= "$token";
                return response($res);
            }else{
                $res['message']='empty!';
                return response($res);
            }
        }
public function showR($id)
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

        $data = User::where('id',$id)->get();
        if (count($data)>0){
            $res['message']="seccess!";
            $res['values']=$data;
            return response($res);
        }else{
            $res['message']='empty!';
            return response($res);
        }
    }

}
