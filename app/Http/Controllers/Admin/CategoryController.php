<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
    }

    public function index($categoryId)
    {
        $categories = $this->category->all();
        $tweets = $this->tweet->searchCategory($categoryId);//tweetのインスタンスに対してsearchCategoryを行なっているので、tweetsテーブルの中のcategory_idに対して行う

        $favorite = new favorite;
        $favorites = $favorite->getFavoriteCount();
        return view('admin.tweet.index', compact('tweets', 'categories', 'favorites' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();        
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $inputs = $request->all();
        $this->category->fill($inputs)->save();
        return redirect()->route('tweet.index');
    }

    public function categoryList()
    {
        $categoryLists = $this->category->all();
        $categories = $this->category->all();
        $subCategoryLists = $this->subCategory->all();
        return view('admin.category.index', compact('categoryLists', 'subCategoryLists', 'categories'));
    }
}
