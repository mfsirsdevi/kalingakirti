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

Route::get('/', 'ArticleController@index');

Route::get('/food', 'ArticleController@showFood');
Route::get('/places', 'ArticleController@showPlaces');
Route::get('/culture', 'ArticleController@showCulture');
Route::get('/article/{article}', 'ArticleController@show');

Route::auth();

Route::get('/admin', 'HomeController@index');

Route::get('/admin/articles', 'HomeController@showArticles');

Route::get('/admin/article/{article}', 'HomeController@showArticle');
Route::get('/admin/article/{article}/edit', 'HomeController@edit');
Route::post('/admin/article/{article}/update', 'HomeController@update');

Route::get('/create', 'HomeController@createArticle');

Route::post('/article', 'HomeController@store');
Route::post('article/{article}/comments', 'CommentController@store');

Route::delete('/article/{article}', 'HomeController@destroy');
