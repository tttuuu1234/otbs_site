<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tweet;
use App\Models\Favorite;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $category;
     public $tweet;

    public function __construct(Category $category, Tweet $tweet)
    {
        $this->category = $category;
        $this->tweet = $tweet;
        $this->middleware('auth');
    }

    public function index($categoryId)
    {
        $categories = $this->category->all();
        $tweets = $this->tweet->searchCategory($categoryId);//tweetのインスタンスに対してsearchCategoryを行なっているので、tweetsテーブルの中のcategory_idに対して行う

        $favorite = new favorite;
        $favoriteTweets = $this->tweet->getFavoriteCount();

        for($i = 0; $i < 10; $i++) {
            $favoriteTweet = $favoriteTweets[$i];
            $favorite->favoriteUpdate($i, $favoriteTweet);
        }
        $favorites = $favorite->getFavoriteCount();
        return view('user.tweet.index', compact('tweets', 'categories','favorites' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();        
        return view('user.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->category->fill($inputs)->save();
        return redirect()->route('tweet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
