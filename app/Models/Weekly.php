<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
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

    public function resetCount()
    {
        return $this->where('weekly', 'weekly')
                    ->update(['count' => 0]);
    }
}
