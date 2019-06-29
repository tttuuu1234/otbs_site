@extends('layout')
@section('content')
<div class="contents">
  <div class="main-contents">
    @foreach ($topLists as $topList)
      <div class="tweet">
        <div class="tweet-header tweet-module"><a href="{{ route('tweet.mypage', $topList->user_id) }}"class="tweet__name link__hover">{{ $topList->user->name }}</a></div>
        <div class="tweet__content tweet-module">{{ $topList->content }}</div>
        <div class="tweet-module"><a href="{{ route('tweet.like', $topList->id) }}" class="tweet__like"><i class="far fa-heart"></i></a>{{ $topList->count }}</div>
        <div class="tweet__category tweet-module">
          <div class="name">メインカテゴリー<i class="far fa-hand-point-right"></i></div>
          <a href="{{ route('category.index', $topList->category_id) }}">{{ $topList->category->name }}</a>
        </div>
        <div class="tweet__category tweet-module">
          <div class="name">サブカテゴリー<i class="far fa-hand-point-right"></i></div>
          <a href="{{ route('subCategory.index', $topList->subCategory_id) }}">{{ $topList->subCategory->content }}</a>
        </div>
      </div>
 
    @endforeach
  </div>

  <div class="side-contents">
    <h3 class="side-ranking__title">お気に入りランキング総合</h3>
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