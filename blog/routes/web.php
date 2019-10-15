<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#melih file difolder view
Route::get('/', function () {
	$posts = App\Post::orderBy('id','desc')->paginate(4);
	$tags = App\Tag::all();
	$negara = App\Negara::all();
	$category = App\Category::all();
	$user = App\User::all();
    return view('index', compact('posts','category','tags','negara','user'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('comment1','PostController@comment1')->name('Overall.comment1');
Route::get('allpost','PostController@allpost')->name('Overall.allpost');
Route::resource('posts','PostController');


Route::resource('admins','admincontroller');
Route::resource('category','CategoryController');
Route::resource('tags','TagController');
Route::post('comment/create/{post}','CommentController@buatkomentar')->name('buatkomentar.store');
Route::post('search','SearchController@search')->name('search');
// Route::get('posts','PostController@allpost')->name('allpost');
Route::resource('negara','NegaraController');
Route::get('alluser','UserController@alluser')->name('Overall.alluser');
Route::resource('users','UserController');
// Route::get('/contact','HomeController@contact')->name('contact');
Route::delete('/comment/{id}','CommentController@destroy');
// Route::resource('pesans','PesanController');
Route::resource('contact','pesan1Controller');
Route::get('allpesan','pesan1Controller@allpesan')->name('Overall.allpesan');