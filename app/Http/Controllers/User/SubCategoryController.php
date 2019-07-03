<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Tweet;
use App\Models\Favorite;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $category;
    public $tweet;

    public function __construct(Category $category, Tweet $tweet, SubCategory $subCategory)
    {
        $this->category = $category;
        $this->tweet = $tweet;
        $this->subcategory = $subCategory;
        $this->middleware('auth');
    }
     
    public function index($subCategoryId)
    {
        $categories = $this->category->all();
        $tweets = $this->tweet->searchSubCategory($subCategoryId);

        return view('user.tweet.index', compact('tweets', 'categories' ));
    }
}
