@extends('layout')
@section('content')

  <div class="tweet-box">
    @foreach ($tweets as $tweet)
      <div class="tweet-container">
        <div class="tweet-header">
          <a href="{{ route('tweet.show', $tweet->id) }}" class="tweet__name link__hover">tsubasa</a>
        </div>
        <div class="tweet__photo">{{ $tweet->content }}</div>
        <div class="tweet-mini-box">
          <!-- <a href="#" class="tweet__comment__btn"><i class="far fa-comment"></i></a> -->
          <div class="tweet__like__btn"><i class="far fa-heart"></i></div>
        </div>
        <div class="tweet__content">テスト</div>
        <!-- <a href="" class="tweet__comment">コメント一覧</a> -->
        <div class="tweet__tag">
        </div>
      </div>
    @endforeach
  </div>
@endsection