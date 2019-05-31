<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Weekly;

class LastWeek extends Model
{
    protected $fillable = [
        'name',
        'count',
        'updated_at',
    ];

    public function getTagCount()
    {
        return $this->orderby('count', 'desc')
                    ->take(10)
                    ->get();
    }


}
