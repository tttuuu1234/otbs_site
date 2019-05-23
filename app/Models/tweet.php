<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;


class tweet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];
    
    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag','tag_tweet', 'tweet_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
