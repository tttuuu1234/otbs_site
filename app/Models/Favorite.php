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

}
