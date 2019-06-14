<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
        'user_id',
        'category_id',
        'subCategory_id',
        'count',
        'tweet_id',
    ];

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


}
