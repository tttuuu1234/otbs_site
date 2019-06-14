<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\TopList;


class TopListController extends Controller
{
    public $tweet;
    public $category;

    public function __construct(Tweet $tweet, Category $category)
    {
        $this->tweet = $tweet;
        $this->category = $category;
        $this->middleware('auth');
    }

    public function index()
    {
        $topList = new topList;
        $categories = $this->category->all();//categoryテーブルから配列の形で全件取得
        // dd($categories);
        
        for($i = 0; $i < count($categories); $i++) {
            $category = $categories[$i];//$categoriesの0番目からカテゴリーを取得
            $categoryId = $category->id;
            $tweets = $this->tweet->where('category_id', $categoryId)->orderby('created_at', 'desc')->take(5)->get();//作成された順の5件取得
            
            for($number = 0; $number < count($tweets); $number++){//$tweetsの数ぶん
                $tweet = $tweets[$number]; //$tweetsは配列で、$tweetsの0番目から順に取得
                $topList->where('category_id', $categoryId)->where('number', $number + 1 )->update([ //top_listsテーブルから、取得してあるcategoryIdが一致していて、numberカラムが一致しているものレコードにupdateメソッド実行する
                    'user_id' => $tweet->user_id,
                    'content' => $tweet->content,
                    'count' => $tweet->count,
                    'category_id' => $tweet->category_id,
                    'subCategory_id' => $tweet->subCategory_id,
                    'tweet__id' => $tweet->id,
                ]);
            }
        }              
        $topLists = $topList->orderby('category_id', 'asc')->get();

        $favorite = new favorite;
        $favoriteTweets = $this->tweet->getFavoriteCount();

        for($i = 0; $i < 10; $i++) {
            $favoriteTweet = $favoriteTweets[$i];
            $favorite->favoriteUpdate($i, $favoriteTweet);
        }

        $favorites = $favorite->getFavoriteCount();
        return view('user.topList.index', compact('topLists', 'categories','favorites' ));
    }
}
