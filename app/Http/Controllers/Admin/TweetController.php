<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Tag;
use App\Models\Weekly;
use App\Models\Monthly;
use App\Models\Day;
use App\Models\Category;
use App\Models\Comment;
use App\Models\SubCategory;
use App\Models\Favorite;
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
    public $day;

    public function __construct(Tweet $tweet, Tag $tag, Category $category, SubCategory $subCategory, Weekly $weekly, monthly $monthly, Day $day, Favorite $favorite)
    {
        $this->tweet = $tweet;
        $this->tag = $tag;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->weekly = $weekly;
        $this->monthly = $monthly;
        $this->day = $day;
        $this->favorite = $favorite;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = $this->category->all();
        $tweets = $this->tweet->orderby('created_at', 'desc')->paginate(10);

        $this->tweet->getFavoriteRanking();
        $favorites = $this->favorite->getFavoriteCount();
        return view('admin.tweet.index', compact('tweets', 'categories','favorites' ));
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
        return view('admin.tweet.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
        $inputs = $request->all();
        $tweet = $this->tweet->fill($inputs)->save();
        $week = $this->weekly->firstOrCreate(['name' => $inputs['name']], ['count' => 0]);
        $month = $this->monthly->firstOrCreate(['name' => $inputs['name']], ['count' => 0]);
        $dayly = $this->day->firstOrCreate(['name' => $inputs['name']], ['count' => 0]);
        // dd($dayly);
        $tag = $this->tag->firstOrCreate(['name' => $inputs['name']], ['count' => 0]);//firstOrCreate(検索したいレコードのカラム名, 新しくレコードを追加する時に挿入する他のカラムの値)
        $tagId = $tag->id;//tagからidを取得している
        $this->tweet->tag()->attach($tagId); //中間テーブルに保存する処理
        return redirect()->route('admin.tweet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->tweet->getFavoriteRanking();
        $favorites = $this->favorite->getFavoriteCount();
        $categories = $this->category->all();
        $tweet = $this->tweet->find($id);
        $categoryId = $tweet->category_id;
        $category = $this->category->find($categoryId);
        return view('admin.tweet.show', compact('tweet', 'categories', 'category', 'favorites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->all();
        $tweet = $this->tweet->find($id);
        return view('admin.tweet.edit', compact('tweet', 'categories'));
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
        return redirect()->route('admin.tweet.index');
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
        return redirect()->route('admin.tweet.index');
    }

        public function createComment(Request $request)
    {
        $comment = new comment;
        $inputs = $request->all();
        $comments = $comment->fill($inputs)->save();
        return redirect()->route('admin.tweet.index');
    }

    public function like($id)
    {
        $tweet = $this->tweet->find($id);
         //tweet_idを基にtweetのオブジェクトを取得 取得しないと中間テーブルに保存した対象のオブジェクトがないことになりtweet_idを保存できない
        if($tweet->users()->where('user_id', $tweet->user_id)->where('tweet_id', $tweet->id)->exists()) { //存在するかどうか
            $tweet->users()->detach(); //中間テーブルから送られてきたオブジェクトを削除
            $tweet->decrement('count');//countカラムの値を1減らす
            return redirect()->route('admin.tweet.index');
        }else{
            $tweet->users()->attach($tweet->user_id); //取得したオブジェクトに対してusersメソッドで中間テーブルにアクセスして、attachメソッドを用いて、userIdとtweetIdを保存
            //なぜ上記のコードでtweetのidも保存できたのか?
            $tweet->increment('count'); //中間テーブルに保存されたらtweetオブジェクトのcountカラムに1追加
            return redirect()->route('admin.tweet.index');
        }
    }

    public function favorite($userId)
    {
        $categories = $this->category->all();   
        $user = new user;
        $users = $user->find($userId);
        return view('admin.tweet.favorite', compact('users', 'categories'));
    }

    public function mypage($userId)
    {
        $user = new user;
        $categories = $this->category->all();   
        $tweets = $this->tweet->where('user_id', $userId)->orderby('updated_at', 'desc')->paginate(10);
        $AuthUser = $user->find($userId);
        return view('admin.tweet.mypage', compact('tweets', 'categories', 'AuthUser'));
    }
}
