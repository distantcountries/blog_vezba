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

use App\Post; //obavezno juzovati posts
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CommentsController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/posts', function () {
//     $posts = Post::published(); //iz funkcije published() u Post.php
//     return view('posts.index', compact('posts')); 
//     //posts.index - indexb.lade je u folderu posts
// });


// Route::get('/posts/{id}', function($id) {
//     // $post = Post::find($id);

//     $post = Post::findOrFail($id); //ako ne nadje id pod tim brojem da izbaci gresku 404, 
//     // ovo je najsigurnije koristiti

//     // $post = Post::where('id', $id)->first(); // druga varijanta, first vraca obekat, get collect

//     return view('posts.show' , compact('post'));
// });

Route::get('/', ['as' => 'all-posts', 
                    'uses' => 'PostsController@index']);

Route::get('/posts', ['as' => 'all-posts', 
                    'uses' => 'PostsController@index']);

Route::get('/posts/create', ['as' => 'create-post', 
                    'uses' => 'PostsController@create']);

Route::get('/posts/{id}', ['as' => 'single-post', 
                'uses' => 'PostsController@show']); 

Route::post('/posts', ['as' => 'store-post',
                        'uses' => 'PostsController@store']);


Route::post('/posts/{postId}/comments', ['as' => 'comments-post',
                        'uses' => 'CommentsController@store']);


Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');


Route::get('/logout', 'LoginController@destroy');
Route::post('/login', 'LoginController@store');
Route::get('/login', 'LoginController@create');



Route::get('/users/{id}', ['as' => 'single-user', 
                'uses' => 'UsersController@show']); 

