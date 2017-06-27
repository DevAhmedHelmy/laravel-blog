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

Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
/*

 \w - any letter character
 \d - any number character
 \- - -
 \_ - _
 + - how many

 */ 
->where('slug','[\w\d\-\_]+');

Route::resource('posts','PostController');