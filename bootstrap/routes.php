<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::auth();

Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@index');
Route::get('/welcome', 'HomeController@welcome');
Route::get('article/{id}', 'ArticleController@show');
Route::post('comment/store', 'CommentController@store');
#Route::resource('comment', 'CommentController');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
	Route::get('/', 'HomeController@index');
	Route::resource('article', 'ArticleController');
	Route::resource('comment', 'CommentController');
	Route::get('comment/{id}/deleted', 'CommentController@deleted');
	Route::get('comment/{id}/reply', 'CommentController@reply');
});

Route::auth();

