<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\TagCounts;

class LastMonth extends Model
{
    use TagCounts;
    protected $fillable = [
        'name',
        'count',
    ];

}
