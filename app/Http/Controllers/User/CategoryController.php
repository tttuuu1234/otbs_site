<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subCategory;
use App\Models\Tweet;
use App\Models\Favorite;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $category;
     public $subCategory;
     public $tweet;

    public function __construct(Category $category, Tweet $tweet, SubCategory $subCategory)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->tweet = $tweet;
        $this->middleware('auth');
    }

    public function index($categoryId)
    {
        $categories = $this->category->all();
        $tweets = $this->tweet->searchCategory($categoryId);//tweetのインスタンスに対してsearchCategoryを行なっているので、tweetsテーブルの中のcategory_idに対して行う

        $favorite = new favorite;
        $favorites = $favorite->getFavoriteCount();
        return view('user.tweet.index', compact('tweets', 'categories', 'favorites' ));
    }

    public function categoryList()
    {
        $categoryLists = $this->category->all();
        $categories = $this->category->all();
        $subCategoryLists = $this->subCategory->all();
        return view('user.category.index', compact('categoryLists', 'subCategoryLists', 'categories'));
    }
}
