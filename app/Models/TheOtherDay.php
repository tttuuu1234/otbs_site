<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\TagCounts;

class TheOtherDay extends Model
{
    use TagCounts;
    protected $fillable = ['name', 'count'];
    protected $table = 'the_other_day';
}
