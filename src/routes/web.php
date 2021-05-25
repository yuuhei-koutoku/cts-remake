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

//users
Auth::routes();

//articles
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

//comments
//Route::resource('/comments', 'CommentController')->except(['index', 'show'])->middleware('auth');
Route::post('articles.comments', 'CommentController@store')->name('comments.store')->middleware('auth');
