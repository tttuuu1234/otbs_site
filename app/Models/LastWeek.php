<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\TagCounts;

class LastWeek extends Model
{
    use TagCounts;
    protected $fillable = [
        'name',
        'count',
        'tag_id',
    ];
}
