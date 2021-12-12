<?php

/*
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
*/

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

//ゲストログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

//articles
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::get('/tags/{name}', 'TagController@show')->name('tags.show'); //タグによる記事検索

//comments
Route::resource('/comments', 'CommentController')->except(['index', 'create', 'show'])->middleware('auth');
