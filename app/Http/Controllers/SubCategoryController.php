<?php

namespace App\Http\Controllers;

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

        $favorite = new favorite;
        $favoriteTweets = $this->tweet->getFavoriteCount();

        for($i = 0; $i < 10; $i++) {
            $favoriteTweet = $favoriteTweets[$i];
            $favorite->favoriteUpdate($i, $favoriteTweet);
        }
        $favorites = $favorite->getFavoriteCount();
        return view('user.tweet.index', compact('tweets', 'categories','favorites' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        return view('user.subcategory.create', compact('categories'));
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
        $this->subCategory->fill($inputs)->save();
        return redirect()->route('tweet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
