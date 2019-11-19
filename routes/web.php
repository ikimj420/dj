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
Auth::routes();
//Home
Route::get('/', 'HomeController@index')->name('welcome');
//Event
Route::get('/home/{event}', 'HomeController@show');
Route::post('/', 'HomeController@store');
Route::patch('/home/{event}', 'HomeController@update');
Route::delete('/home/{event}', 'HomeController@destroy');
//Contact
Route::get('/contact', 'ContactController@index');
//Send Mail
Route::post('/contact', 'ContactController@store');
//News
Route::get('/blog', 'BlogsController@index')->name('blog.index');
Route::post('/blog', 'BlogsController@store');
Route::get('/blog/{blog}', 'BlogsController@show');
Route::patch('/blog/{blog}', 'BlogsController@update');
Route::delete('/blog/{blog}', 'BlogsController@destroy');
//Profile-About
Route::get('about', 'UsersController@index')->name('users.index');
Route::patch('/about/{about}', 'UsersController@update');
//Video
Route::post('/video', 'VideoController@store');
Route::get('/video/{video}', 'VideoController@show');
Route::patch('/video/{video}', 'VideoController@update');
Route::delete('/video/{video}', 'VideoController@destroy');
//Show Group Of Tags
Route::get('/tag/tags/{tag}', 'TagsController@index')->name('tags.index');
//Album
Route::post('/album', 'AlbumController@store');
Route::get('/album/{album}', 'AlbumController@show');
Route::patch('/album/{album}', 'AlbumController@update');
Route::delete('/album/{album}', 'AlbumController@destroy');
//Image
Route::post('/album/{album}', 'ImageController@store');
Route::get('/image/{image}', 'ImageController@show');
Route::patch('/image/{image}', 'ImageController@update');
Route::delete('/image/{image}', 'ImageController@destroy');
