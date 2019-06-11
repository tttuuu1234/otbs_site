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
Route::post('tweet/like', ['as' => 'tweet.like', 'uses' => 'TweetController@like']);
Route::get('tweet/{id}/favorite', ['as' => 'tweet.favorite', 'uses' => 'TweetController@favorite']);
Route::get('tweet/category/{id}', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
Route::get('tweet/subcategory/{id}', ['as' => 'subcategory.index', 'uses' => 'SubCategoryController@index']);
Route::get('tweet/tag/{id}', ['as' => 'tag.index', 'uses' => 'TagController@index']);

Route::resource('daily', DayController::class, ['only' => ['index']]);
Route::resource('weekly', WeeklyController::class, ['only' => ['index']]);
Route::resource('monthly', MonthlyController::class, ['only' => ['index']]);
Route::resource('category', CategoryController::class, ['only' => ['create', 'store']]);
Route::resource('subCategory', SubCategoryController::class, ['only' => ['create', 'store']]);


Route::auth();

Route::get('/home', 'HomeController@index');
