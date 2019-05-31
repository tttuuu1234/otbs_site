@extends('layout')
@section('content')

  <div class="tweet-box is-padding inner">
    <div class="category-box"><a href="{{ route('category.create') }}">カテゴリー</a></div>
    <div class="sub-category-box"><a href="{{ route('subCategory.create') }}">サブカテゴリー</a></div>

    <div class="attention-tag">
      <div class="weekly-tag-count">
        <a href="{{ route('weekly.index') }}">weekly</a>
      </div>

      <div class="monthly-tag-count">
        <a href="{{ route('monthly.index') }}">monthly</a>
      </div>
    </div>

    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__list__item nav-category"><a href="{{ route('tweet.index') }}">all</a></li>
        @foreach ($categories as $category)
          <li class="nav__list__item">
            {!! Form::open(['route' => 'tweet.index', 'method' => 'get']) !!} <!--indexにnameと送っている-->
              {!! Form::input('hidden', 'category_id', $category->id)!!} <!--categoryテーブルに保存されているidを連想配列のkeyに指定-->
              {!! Form::input('submit', 'name', $category->name, ['class' => 'nav-category'])!!}
            {!! Form::close() !!}
            <div class="sub__nav__list is-hidden">
              <ul class="sub__nav__list__items inner">
                @foreach ($category->subCategory as $subCategory)
                  {!! Form::open(['route' => 'tweet.index', 'method' => 'get']) !!} <!--indexにnameと送っている-->
                    {!! Form::input('hidden', 'subCategory_id', $subCategory->id) !!}
                    <li class="sub__nav__list__item">{!! Form::input('submit', 'content', $subCategory->content) !!}</li>
                  {!! Form::close() !!}
                @endforeach
              </ul>      
            </div>
          </li>     
        @endforeach
      </ul>
    </nav>

    @foreach ($tweets as $tweet)
      <div class="tweet-container">
        <div class="tweet-header">
          <a href="{{ route('tweet.show', $tweet->id) }}" class="tweet__name link__hover">{{ $tweet->user->name }}</a>
        </div>
        <div class="tweet__content">{{ $tweet->content }}</div>
        <div class="tweet__like__btn"><i class="far fa-heart"></i></div>
        <div class="tweet__category">{{ $tweet->category->name }}</div>
        <div class="tweet__sub__category">{{ $tweet->subCategory->content }}</div>
        <a href="{{ route('tweet.show', $tweet->id) }}" class="tweet__comment">{{ $tweet->comment->count() }}</a>
        <div class="tweet__tag">
        @foreach ($tweet->tag as $tag)
          {!! Form::open(['route' => 'tweet.index', 'method' => 'get']) !!}
            {!! Form::input('hidden', 'tag_id', $tag->id) !!}<!--tweetからtagの情報を引っ張ってきてtagのidを取得している-->
            {!! Form::input('hidden', 'count', $tag->count) !!}
            {!! Form::input('submit', 'name', $tag->name) !!} 
          {!! Form::close() !!}
        @endforeach
        </div>
      </div>
    @endforeach
  </div>
@endsection