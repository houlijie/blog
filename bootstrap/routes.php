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

Route::auth();

Route::get('/', 'article@index');

Route::group(['namespace' => 'pc', 'prefix' => 'pc'], function(){
    Route::get('article-list', 'article@index');
    Route::get('article/{slug}', 'article@showPost');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    
});
