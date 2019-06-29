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
Route::get('user/{id}', 'TweetController@mypage')->name('tweet.mypage');
Route::get('user/{id}/favorite', ['as' => 'tweet.favorite', 'uses' => 'TweetController@favorite']);
Route::get('/tweet', 'TweetController@index')->name('tweet.index');
Route::get('tweet/create', 'TweetController@create')->name('tweet.create');
Route::post('/tweet', 'TweetController@store')->name('tweet.store');
Route::get('tweet/{id}', ['as' => 'tweet.show', 'uses' => 'TweetController@show']);
Route::get('tweet/{id}/edit', ['as' => 'tweet.edit', 'uses' => 'TweetController@edit']);
Route::put('tweet/{id}/', ['as' => 'tweet.update', 'uses' => 'TweetController@update']);
Route::delete('tweet/{id}/', ['as' => 'tweet.destroy', 'uses' => 'TweetController@destroy']);
Route::post('tweet/comment', ['as' => 'comment.create', 'uses' => 'TweetController@createComment']);
Route::get('tweet/like/{id}', ['as' => 'tweet.like', 'uses' => 'TweetController@like']);
Route::get('category/{id}', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
Route::get('categories', ['as' => 'category.list', 'uses' => 'CategoryController@categoryList']);
Route::get('subcategory/{id}', ['as' => 'subCategory.index', 'uses' => 'SubCategoryController@index']);
Route::get('tag/{id}', ['as' => 'tag.index', 'uses' => 'TagController@index']);

Route::get('top', 'TopListController@index')->name('top.index');
Route::get('ranking/tag/daily', 'TagRankingController@daily')->name('tag.ranking.daily');
Route::get('ranking/tag/weekly', 'TagRankingController@weekly')->name('tag.ranking.weekly');
Route::get('ranking/tag/monthly', 'TagRankingController@monthly')->name('tag.ranking.monthly');
Route::resource('categorize', CategoryController::class, ['only' => ['create', 'store']]);
Route::resource('subCategory', SubCategoryController::class, ['only' => ['create', 'store']]);


Route::auth();

Route::get('/home', 'HomeController@index');
