@extends('layout')
@section('content')
<div class="contents">
  <div class="main-contents">
    @foreach ($topLists as $topList)
      <div class="tweet-container">
        <div class="tweet-header">
          <a href="{{ route('tweet.mypage', $topList->user_id) }}"class="tweet__name link__hover">{{ $topList->user->name }}</a>
        </div>
        <div class="tweet__content">{{ $topList->content }}</div>
        {!! Form::open(['route' => 'tweet.like']) !!}
        {!! Form::input('hidden', 'tweet_id', $topList->tweet__id ) !!}
        {!! Form::input('hidden', 'user_id', Auth::id() ) !!}
        {!! Form::input('hidden', 'name', $topList->user->name ) !!}
        <button type='submit' id="like-btn">
          <i class="far fa-heart"></i>
        </button>
        {!! Form::close() !!}
        <div class="tweet__like__count">{{ $topList->count }}</div>
        <div class="tweet__category">{{ $topList->category->name }}</div>
        <div class="tweet__sub__category">{{ $topList->subCategory->content }}</div>
      </div>
    @endforeach
  </div>

  <div class="side-contents">
    <h3 class="side-ranking__title">ランキング総合</h3>
    <p class="side-ranking__read">最近人気のあったニュース</p>
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