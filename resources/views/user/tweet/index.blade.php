@extends('layout')
@section('content')

  <div class="tweet-box">
    <div class="category-box"><a href="{{ route('category.create') }}">カテゴリー</a></div>
    <nav class="nav inner">
      <ul class="nav__list">
        <li class="nav__list__item"><a href="#">all</a></li>
        @foreach ($categories as $category)
        {!! Form::open(['route' => 'tweet.index', 'method' => 'get']) !!} <!--indexにnameと送っている-->
          {!! Form::input('hidden', 'category_id', $category->id)!!} <!--categoryテーブルに保存されているidを連想配列のkeyに指定-->
          {!! Form::input('submit', 'name', $category->name,['class' => "nav__list__item"])!!}
        {!! Form::close() !!}
        @endforeach
      </ul>

      <!-- <ul class="nav__contents__list">
        <li class="nav__contents is-hidden"><a href="#">hello</a></li>
        <li class="nav__contents is-hidden"><a href="#">こんにちは</a></li>
        <li class="nav__contents is-hidden"><a href="#">何してるの</a></li>
        <li class="nav__contents is-hidden"><a href="#">遊んでるの</a></li>
        <li class="nav__contents is-hidden"><a href="#">いいなあ</a></li>
        <li class="nav__contents is-hidden"><a href="#">愛してる</a></li>
      </ul> -->
    </nav>
    @foreach ($tweets as $tweet)
      <div class="tweet-container">
        <div class="tweet-header">
          <a href="{{ route('tweet.show', $tweet->id) }}" class="tweet__name link__hover">{{ $tweet->user->name }}</a>
        </div>
        <div class="tweet__photo">{{ $tweet->content }}</div>
        <div class="tweet-mini-box">
          <!-- <a href="#" class="tweet__comment__btn"><i class="far fa-comment"></i></a> -->
          <div class="tweet__like__btn"><i class="far fa-heart"></i></div>
        </div>
        <div class="tweet__content">{{ $tweet->category->name }}</div>
        <!-- <a href="" class="tweet__comment">コメント一覧</a> -->
        <div class="tweet__tag">
        @foreach ($tweet->tag as $tag)
          {!! Form::open(['route' => 'tweet.index', 'method' => 'get']) !!}
            {!! Form::input('hidden', 'tag_id', $tag->id) !!}<!--tweetからtagの情報を引っ張ってきてtagのidを取得している-->
            {!! Form::input('submit', 'name', $tag->name) !!} 
          {!! Form::close() !!}
        @endforeach
        </div>
      </div>
    @endforeach
  </div>
@endsection