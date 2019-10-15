<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
/*
USERS
*/
Route::post('users/login','UserController@loginR');
Route::post('/users/store','UserController@storeR');
Route::put('/users/update/{id}','UserController@updateR');
Route::delete('/users/delete/{id}','UserController@destroyR');

Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
	
    Route::get('users', 'UserController@indexR');    
    Route::get('users/{id}','UserController@showR');
    Route::get('comments','CommentController@indexApi');
    Route::get('comments/{id}','CommentController@showAPI');
    Route::get('posts','PostController@indexApi');

    Route::get('closed', 'DataController@closed');
});


