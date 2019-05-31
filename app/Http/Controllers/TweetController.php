<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use App\Models\Tag;
use App\Models\Weekly;
use App\Models\Monthly;
use App\Models\Category;
use App\Models\Comment;
use App\Models\SubCategory;

use Illuminate\Support\Facades\Auth;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $tweet;
    public $tag; 
    public $category;
    public $subCategory;
    public $weekly;
    public $monthly;

    public function __construct(Tweet $tweet, Tag $tag, Category $category, SubCategory $subCategory, Weekly $weekly, monthly $monthly)
    {
        $this->tweet = $tweet;
        $this->tag = $tag;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->weekly = $weekly;
        $this->monthly = $monthly;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $inputs = $request->all(); //Formから送られてきた値
            // dd($inputs);
        $categories = $this->category->all();
        if(array_key_exists('category_id', $inputs)) {
            $tweets = $this->tweet->searchCategory($inputs); //tweetのインスタンスに対してsearchCategoryを行なっているので、tweetsテーブルの中のcategory_idに対して行う
        } elseif(array_key_exists('tag_id', $inputs)) {
            $tags = $this->tag->find($inputs['tag_id']); //$inputsに格納されているtag_idの値をfindでそのidをしているtagのオブジェクトを取得
            $weeklyTag = $this->weekly->find($inputs['tag_id']);
            $monthlyTag = $this->monthly->find($inputs['tag_id']);
            $weeklyTag->increment('count');
            $monthlyTag->increment('count');
            $tweets = $tags->tweet()->orderby('tag_id', 'desc')->get(); //tagのオブジェクトに対してtweetメソッドで中間テーブルにアクセスして取得
            return view('user.tweet.index', compact('tweets', 'categories'));
        } elseif(array_key_exists('subCategory_id', $inputs)){
            $tweets = $this->tweet->searchSubCategory($inputs);
        } else {
            $tweets = $this->tweet->orderby('created_at', 'desc')->get();
        }
        // dd($tweets);
        // $sortTagCount = $this->tag->sortCount();//count数が多い順の10件を取得


        return view('user.tweet.index', compact('tweets', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        $subCategories = $this->subCategory->all();
        return view('user.tweet.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {

        //レコードを1件取得するためにその中の一意なものをwhereで指定する
        //取得したレコードからidをとる
        //そのidを元にfindでオブジェクト取得

        $inputs = $request->all();
        $tweet = $this->tweet->fill($inputs)->save();
        $week = $this->weekly->fill($inputs)->save();
        $month = $this->monthly->fill($inputs)->save();
        $tag = $this->tag->firstOrCreate(['name' => $inputs['name']], ['count' => 0]);//firstOrCreate(検索したいレコードのカラム名, 新しくレコードを追加する時に挿入する他のカラムの値)
        $tagId = $tag->id;//tagからidを取得している
        $this->tweet->tag()->attach($tagId); //中間テーブルに保存する処理
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
        $tweets = $this->tweet->find($id);
        return view('user.tweet.show', compact('tweets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = $this->tweet->find($id);
        return view('user.tweet.edit', compact('tweet'));
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
        $inputs = $request->all();
        // $inputs['user_id'] = Auth::id();
        $this->tweet->find($id)->fill($inputs)->save();
        return redirect()->route('tweet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tweet->find($id)->delete();
        return redirect()->route('tweet.index');
    }

    public function createComment(Request $request)
    {
        $comment = new comment;
        $inputs = $request->all();
        $comments = $comment->fill($inputs)->save();
        return redirect()->route('tweet.index');
    }

}
