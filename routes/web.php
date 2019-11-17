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

Route::get('/', 'HomeController@index')->name('welcome');
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
//Profile
//Route::resource('about', 'ProfileController');
Route::get('/about', function () {
    return view('about');
});
//Show Group Of Tags
Route::get('/tag/tags/{tag}', 'TagsController@index')->name('tags.index');
