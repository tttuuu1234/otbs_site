<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function tweet()
    {
        return $this->belongsToMany('App\Models\Tweet', 'tag_tweet','tweet_id', 'tag_id');
    }
}
