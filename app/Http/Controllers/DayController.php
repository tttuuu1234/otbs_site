<?php

namespace App\Http\Controllers;
use App\Models\TheOtherDay;

use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {   
        $theOtherDay = new theOtherDay;
        $theOtherDaysTagCounts = $theOtherDay->getTagCount();
        return view('user.daily.index',compact('theOtherDaysTagCounts'));
    }
}
