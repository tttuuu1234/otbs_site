@extends('layout')
@section('content')
<div class="contents">
  <div class="main-contents">
    @foreach ($tweets as $tweet)
      <div class="tweet-container">
        <div class="tweet-header">
          <a href="{{ route('tweet.mypage', $tweet->user_id) }}" class="tweet__name link__hover">{{ $tweet->user->name }}</a>
        </div>
        <div class="tweet__content"><a href="{{ route('tweet.show', $tweet->id) }}">{{ $tweet->content }}</a></div>
        {!! Form::open(['route' => 'tweet.like']) !!}
          {!! Form::input('hidden', 'tweet_id', $tweet->id ) !!}
          {!! Form::input('hidden', 'user_id', Auth::id() ) !!}
          {!! Form::input('hidden', 'name', $tweet->user->name ) !!}
          <button type='submit' id="like-btn">
            <i class="far fa-heart"></i>
          </button>
        {!! Form::close() !!}
        <div class="tweet__like__count">{{ $tweet->count }}</div>
        <div class="tweet__category">{{ $tweet->category->name }}</div>
        <div class="tweet__sub__category">{{ $tweet->subCategory->content }}</div>
        <a href="{{ route('tweet.show', $tweet->id) }}" class="tweet__comment">{{ $tweet->comment->count() }}</a>
        <div class="tweet__tag">
        @foreach ($tweet->tag as $tag)
            <a href="{{ route('tag.index', $tag->id) }}">{{ $tag->name }}</a><!--tweetからtagの情報を引っ張ってきてtagのidを取得している-->
        @endforeach
        </div>  
      </div>
    @endforeach

    <div class="paginate">
      {{ $tweets->links() }}
    </div>
  </div>

  <div class="side-contents">
    <h3 class="side-ranking__title">記事ランキング総合</h3>
    <p class="side-ranking__read">最近人気のあった記事</p>
    <div class="side-ranking">
        <ul class="side-inner">
        @foreach ($favorites as $favorite)
          <li class="side-favorite-list">
            <div class="side-favorite-rank is-favorite">{{ $favorite->ranking }}位</div>
            <div class="side-favorite-content is-favorite">{{ $favorite->content }}</div>
            <div class="side-favorite-count is-favprite">{{ $favorite->count }}fav</div>
          </li>
          @endforeach
        </ul>
    </div>
  </div>
</div>
@endsection