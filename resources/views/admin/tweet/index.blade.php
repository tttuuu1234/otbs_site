@extends('admin.AdminLayout')
@section('content')
  <div class="main-contents">
    @if(isset($tweets))
    @foreach ($tweets as $tweet)
      <div class="tweet">
        <div class="tweet-header tweet-module"><a href="{{ route('tweet.mypage', $tweet->user_id) }}" class="tweet__name link__hover">{{ $tweet->user->name }}</a></div>
        <div class="tweet__content"><a href="{{ route('tweet.show', $tweet->id) }}">{{ $tweet->content }}</a></div>
        <div class="tweet-inner">
          <div class="tweet__like"><a href="{{ route('tweet.like', $tweet->id) }}"><i class="far fa-heart"></i></a>{{ $tweet->count }}</div>
          <div class="tweet__comment-btn"><a href="{{ route('tweet.show', $tweet->id) }}"><i class="far fa-comment"></i></a>{{ $tweet->comment->count() }}</div>
      		<div class="tweet__favorite"><a href="{{ route('tweet.favorite', $tweet->user->id) }}"><i class="far fa-star"></i></a></div>
        </div>
        <div class="tweet__category tweet-module">
          <div class="name">メインカテゴリー<i class="far fa-hand-point-right"></i></div>
          <a href="{{ route('category.index', $tweet->category_id) }}">{{ $tweet->category->name }}</a>
        </div>
        <div class="tweet__category tweet-module">
          <div class="name">サブカテゴリー<i class="far fa-hand-point-right"></i></div>
          <a href="{{ route('subCategory.index', $tweet->subCategory_id) }}">{{ $tweet->subCategory->content }}</a>
        </div>
        <div class="tweet-module">
        @foreach ($tweet->tag as $tag)
            <a href="{{ route('tag.index', $tag->id) }}" class="tweet__tag">{{ $tag->name }}</a><!--tweetからtagの情報を引っ張ってきてtagのidを取得している-->
        @endforeach
        </div>  
      </div>
    @endforeach
    @endif
    <div class="paginate">
      {{ $tweets->links() }}
    </div>
  </div>
@endsection