<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Weekly;

class LastMonth extends Model
{
    protected $fillable = [
        'name',
        'count',
    ];

    public function getTagCount()
    {
        return $this->orderby('count', 'desc')
                    ->take(10)
                    ->get();
    }

}
