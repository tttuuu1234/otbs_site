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

Route::get('/tweet', 'TweetController@index')->name('tweet.index');
Route::get('tweet/create', 'TweetController@create')->name('tweet.create');
Route::post('/tweet', 'TweetController@store')->name('tweet.store');
Route::get('tweet/{id}', ['as' => 'tweet.show', 'uses' => 'TweetController@show']);
Route::get('tweet/{id}/edit', ['as' => 'tweet.edit', 'uses' => 'TweetController@edit']);
Route::put('tweet/{id}/', ['as' => 'tweet.update', 'uses' => 'TweetController@update']);
Route::delete('tweet/{id}/', ['as' => 'tweet.destroy', 'uses' => 'TweetController@destroy']);
Route::post('tweet/comment', ['as' => 'comment.create', 'uses' => 'TweetController@createComment']);

Route::resource('tag', TagController::class);
Route::resource('category', CategoryController::class);

Route::auth();

Route::get('/home', 'HomeController@index');
