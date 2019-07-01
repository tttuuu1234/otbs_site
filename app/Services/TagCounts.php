<?php

namespace App\Services;

trait TagCounts
{
    public function getTagCount()
    {
        return $this->orderby('count', 'desc')
                    ->take(10)
                    ->get();
    }

    public function resetCount()
    {
        return $this->where('daily', 'daily')
                    ->update(['count' => 0]);
    }
}
