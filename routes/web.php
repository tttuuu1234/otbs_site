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

Route::get('/', 'TweetController@index')->name('tweet.index');
Route::get('tweet/create', 'TweetController@create')->name('tweet.create');
Route::post('/', 'TweetController@store')->name('tweet.store');