@extends('layout')
@section('content')
      <nav class="nav">
        <ul class="nav__list">
          <li class="nav__list__item nav-category"><a href="{{ route('tweet.index') }}">全記事</a></li>
          @foreach ($categories as $category)
            <li class="nav__list__item">
              <a href="{{ route('category.index', $category->id) }}">{{ $category->name }}</a>
              <div class="sub__nav__list is-hidden">
                <ul class="sub__nav__list__items inner">
                  @foreach ($category->subCategory as $subCategory)
                    <li class="sub__nav__list__item"><a href="{{ route('subcategory.index', $subCategory->id) }}">{{ $subCategory->content }}</a></li>
                  @endforeach
                </ul>      
              </div>
            </li>     
          @endforeach
          <li class="nav__list__item"><a href="{{ route('tag.ranking.daily') }}">ランキング</a></li>
        </ul>
      </nav>

    <div class="contents">
      <div class="main-contents">
        @foreach ($topLists as $topList)
          <div class="tweet-container">
            <div class="tweet-header">
              <a href="{{ route('tweet.show', $topList->tweet__id) }}" class="tweet__name link__hover">{{ $topList->user->name }}</a>
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