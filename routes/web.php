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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });
Route::group(['middleware'=>['web']],function(){

    // Authentication Routes
    Auth::routes();

    // Categories
    Route::resource('categories','CategoryController',['except'=>['create']]);
    // Tag
    Route::resource('tags','TagController');
    // Others
    Route::get('/', 'PagesController@getIndex');
    Route::get('/about', 'PagesController@getAbout');
    Route::get('/contact', 'PagesController@getContact');
    Route::post('/contact',['uses'=> 'PagesController@postContact','as'=>'contact']);

    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
    /*

    \w - any letter character
    \d - any number character
    \- - -
    \_ - _
    + - how many

    */ 
    ->where('slug','[\w\d\-\_]+');

    Route::get('blog',['as'=>'blog.index','uses'=> 'BlogController@getIndex']);

    Route::resource('posts','PostController');
    Route::resource('comments','CommentsController',['except'=>['index','show','create']]);//create is on next line
    //seperated  because post_id will associated in comments controller
    Route::post('comments/{post_id}',['as'=>'comments.store','uses'=>'CommentsController@store']);

    // view delete for comment
    Route::get('comments/{id}',['as'=>'comments.delete','uses'=> 'CommentsController@delete']);

});