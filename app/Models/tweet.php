<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'user_id',
        'category_id',
        'subCategory_id',
        'count',
    ];

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    
    
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('tweet_id');
    }

    public function scopeEqual($query, $colmnName, $colmnValue)
    {
        if(!empty($colmnValue)) {
            $query->where($colmnName, $colmnValue);
        }
    }

    public function alreadyExists($tweet)
    {
        return $this->equal('user_id', $tweet->user->id)
                    ->equal('tweet_id', $tweet->id) 
                    ->exists();
    }
    public function searchCategory($inputs) 
    {
        return $this->equal('category_id', $inputs['category_id']) //第一引数のカラムに第二引数で指定した値が入っているレコードの指定
                    ->orderby('created_at', 'desc')
                    ->get();
    }

    public function searchSubCategory($inputs)
    {
        return $this->equal('subCategory_id', $inputs['subCategory_id'])
                    ->orderby('created_at', 'desc')
                    ->get();
    }

    public function getFavoriteCount()
    {
        return $this->orderby('count', 'desc')
                    ->take(10)
                    ->get();
    }
}
