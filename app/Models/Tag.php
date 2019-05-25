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
        return $this->belongsToMany(Tweet::class);
    }

    public function scopeEqual($query, $colmnName, $colmnValue)
    {
        if(!empty($colmnValue)) {
            $query->where($colmnName, $colmnValue);
        }
    }

}
