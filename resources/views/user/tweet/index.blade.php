@extends('layout')
@section('content')

  <div class="tweet-box">
    <div class="tweet-header">
    @foreach ($tweets as $tweet)
      <a href="#" class="tweet__name">tsubasa</a>
    </div>
    <div class="tweet__photo">{{ $tweet->content }}</div>
    <div class="tweet-mini-box">
      <!-- <a href="#" class="tweet__comment__btn"><i class="far fa-comment"></i></a> -->
      <div class="tweet__like__btn"><i class="far fa-heart"></i></div>
    </div>
    <div class="tweet__content">テスト</div>
    <!-- <a href="" class="tweet__comment">コメント一覧</a> -->
    @endforeach
  </div>



@endsection