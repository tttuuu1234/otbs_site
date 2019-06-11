<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'category_id',
        'subCategory_id',
        'count',
    ];

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

}
