<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use App\Models\Tag;
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

    public function __construct(Tweet $tweet, Tag $tag)
    {
        $this->tweet = $tweet;
        $this->tag = $tag;
        $this->middleware('auth');
    }

    public function index()
    {
        $tweets = $this->tweet->all();
        // dd($tweets);
        return view('user.tweet.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.tweet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $tweet =$this->tweet->fill($inputs)->save();
        $this->tag->fill($inputs)->save();

        //レコードを1件取得するためにその中の一意なものをwhereで指定する
        //取得したレコードからidをとる
        //そのidを元にfindでオブジェクト取得
        //
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
}
