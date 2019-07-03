<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth:admin');
    }
     
    public function index($subCategoryId)
    {
        $categories = $this->category->all();
        $tweets = $this->tweet->searchSubCategory($subCategoryId);

        return view('admin.tweet.index', compact('tweets', 'categories' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $inputs = $request->all();
        $this->subcategory->fill($inputs)->save();
        return redirect()->route('admin.tweet.index');
    }
}
