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

// user
Route::group(['middleware' => 'guest', 'namespace' => 'User'], function(){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('register');
    Route::post('register', 'Auth\RegisterController@adminRegister')->name('register');
    Route::get('password/rest', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
});


Route::group(['middleware' => 'auth', 'namespace' => 'User'], function(){
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('user/{id}', 'TweetController@mypage')->name('tweet.mypage');
    Route::get('user/{id}/favorite', ['as' => 'tweet.favorite', 'uses' => 'TweetController@favorite']);
    Route::resource('tweet', TweetController::class);
    Route::post('tweet/comment', ['as' => 'comment.create', 'uses' => 'TweetController@createComment']);
    Route::get('tweet/like/{id}', ['as' => 'tweet.like', 'uses' => 'TweetController@like']);
    Route::get('category/{id}', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('categories', ['as' => 'category.list', 'uses' => 'CategoryController@categoryList']);
    Route::get('subcategory/{id}', ['as' => 'subCategory.index', 'uses' => 'SubCategoryController@index']);
    Route::get('tag/{id}', ['as' => 'tag.index', 'uses' => 'TagController@index']);
    Route::get('ranking/tag/daily', 'TagRankingController@daily')->name('tag.ranking.daily');
    Route::get('ranking/tag/weekly', 'TagRankingController@weekly')->name('tag.ranking.weekly');
    Route::get('ranking/tag/monthly', 'TagRankingController@monthly')->name('tag.ranking.monthly');
});

// admin
Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'],  function() {
    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@adminRegister')->name('admin.register');
    Route::get('password/rest', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('tweet', TweetController::class);
    Route::get('user/{id}/favorite', ['as' => 'tweet.favorite', 'uses' => 'TweetController@favorite']);
    Route::get('user/{id}', 'TweetController@mypage')->name('tweet.mypage');
    Route::post('tweet/comment', ['as' => 'comment.create', 'uses' => 'TweetController@createComment']);
    Route::get('tweet/like/{id}', ['as' => 'tweet.like', 'uses' => 'TweetController@like']);
    Route::resource('categorize', CategoryController::class, ['only' => ['create', 'store']]);
    Route::resource('subCategory', SubCategoryController::class, ['only' => ['create', 'store']]);
    Route::get('category/{id}', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('categories', ['as' => 'category.list', 'uses' => 'CategoryController@categoryList']);
    Route::get('subcategory/{id}', ['as' => 'subCategory.index', 'uses' => 'SubCategoryController@index']);
    Route::get('tag/{id}', ['as' => 'tag.index', 'uses' => 'TagController@index']);
    Route::get('ranking/tag/daily', 'TagRankingController@daily')->name('tag.ranking.daily');
    Route::get('ranking/tag/weekly', 'TagRankingController@weekly')->name('tag.ranking.weekly');
    Route::get('ranking/tag/monthly', 'TagRankingController@monthly')->name('tag.ranking.monthly');

});

