<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FavoriteRanking;

class Favorite extends Model
{
    use FavoriteRanking;

    protected $fillable = [
        'content',
        'user_id',
        'category_id',
        'subCategory_id',
        'count',
    ];
}
