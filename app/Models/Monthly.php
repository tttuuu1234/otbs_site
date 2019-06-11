<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\TagCounts;

class Monthly extends Model
{
    use TagCounts;
    protected $fillable = [
        'name',
        'count',
    ];
}
