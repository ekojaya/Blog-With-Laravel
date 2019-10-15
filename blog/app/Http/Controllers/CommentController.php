<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('indexApi','buatkomentar','showAPI');
    }

    public function buatkomentar(Request $Request, Post $post){
    	$comment = new Comment;
    	$comment->comment = $Request->comment;
    	$comment->post_id = $post->id;
    	$comment->user_id = auth()->user()->id;

    	$post->comments()->save($comment);
    	return back()->withInfo('Komentar sukses...');
    }

    public function destroy($id)
    {
        $comment= Comment::find($id);
        $comment->delete();
        return back()->withInfo('berhasil di hapus');
    }

    public function indexApi (){

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

            $data = Comment::all();
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

         $data = Comment::where('id',$id)->get();
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
 