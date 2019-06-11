<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'count',
    ];

    public function tweet()
    {
        return $this->belongsToMany(Tweet::class);
    }

    public function sortCount()
    {
        return $this->orderby('count', 'desc')
                    ->take(10)
                    ->get();
    }
    
}
