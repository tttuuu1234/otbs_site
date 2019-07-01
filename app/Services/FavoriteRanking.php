<?php

namespace App\Services;
use App\Models\Tweet;
use App\Models\Favorite;

trait FavoriteRanking
{
    public function getFavoriteCount()
    {
        return $this->orderby('count', 'desc')
                    ->take(10)
                    ->get();
    }

    public function favoriteUpdate($i, $favoriteTweet) 
    {

        $this->find($i + 1)->update([
            'user_id' => $favoriteTweet->user_id,
            'content' => $favoriteTweet->content,
            'category_id' => $favoriteTweet->category_id,
            'subCategory_id' => $favoriteTweet->subCategory_id,
            'count' => $favoriteTweet->count,
        ]);
    }

    public function getFavoriteRanking()
    {
        $tweet = new tweet;
        $favorite = new favorite;

        $favoriteTweets = $tweet->getFavoriteCount();

        for($i = 0; $i < 10; $i++) {
            $favoriteTweet = $favoriteTweets[$i];
            $favorite->favoriteUpdate($i, $favoriteTweet);
        }
    }

}