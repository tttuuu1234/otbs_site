<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    protected $fillable = [
        'content',
        'tweet_time',
        'user_id',
    ];
}
