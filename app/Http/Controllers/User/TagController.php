<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Tag;
use App\Models\Weekly;
use App\Models\Monthly;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Day;
use App\Models\Favorite;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Tweet $tweet, Tag $tag, Category $category, SubCategory $subCategory, Weekly $weekly, monthly $monthly)
    {
        $this->tweet = $tweet;
        $this->tag = $tag;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->weekly = $weekly;
        $this->monthly = $monthly;
        $this->middleware('auth');
    }

    public function index($tagId)
    {
        $categories = $this->category->all();
        $day = new day;

        $tags = $this->tag->find($tagId); //$inputsに格納されているtag_idの値をfindでそのidをしているtagのオブジェクトを取得
        $weeklyTag = $this->weekly->find($tagId);
        $monthlyTag = $this->monthly->find($tagId);
        $dailyTag = $day->find($tagId);
        $weeklyTag->increment('count');
        $monthlyTag->increment('count');
        $this->tag->increment('count');
        $dailyTag->increment('count');
        $tweets = $tags->tweet()->orderby('tag_id', 'desc')->paginate(10); //tagのオブジェクトに対してtweetメソッドで中間テーブルにアクセスして取得

        $favorite = new favorite;
        $favoriteTweets = $this->tweet->getFavoriteCount();

        for($i = 0; $i < 10; $i++) {
            $favoriteTweet = $favoriteTweets[$i];
            $favorite->favoriteUpdate($i, $favoriteTweet);
        }
        $favorites = $favorite->getFavoriteCount();
        return view('user.tweet.index', compact('tweets', 'categories', 'favorites'));
    }
}
