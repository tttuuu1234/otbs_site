<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheOtherDay;
use App\MOdels\LastWeek;
use App\Models\LastMonth;
use App\Models\Category;

class TagRankingController extends Controller
{
    public $categoy;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware('auth:admin');
    }

    public function daily()
    {
        $theOtherDay = new theOtherDay;

        $categories = $this->category->all();
        $theOtherDaysTagCounts = $theOtherDay->getTagCount();
        // dd($theOtherDaysTagCounts);
        return view('admin.tagRanking.index',compact('theOtherDaysTagCounts', 'categories'));
    }

    public function monthly()
    {
        $categories = $this->category->all();
        $lastMonth = new lastMonth;
        $lastMonthTags = $lastMonth->getTagCount();
        return view('admin.tagRanking.index', compact('lastMonthTags', 'categories'));
    }

    public function weekly()
    {
        $categories = $this->category->all();

        $lastWeek = new lastWeek;
        $lastWeekTags = $lastWeek->getTagCount();
        return view('admin.tagRanking.index', compact('lastWeekTags', 'categories'));
    }

}
