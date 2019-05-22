@extends('layout')
@section('content')

<div class="tweet-box">
    <div class="tweet-header">
      <div class="tweet__name ">tsubasa</div>
    </div>
    <div class="tweet__photo">{{ $tweets->content }}</div>
    <div class="tweet-mini-box">
      <!-- <a href="#" class="tweet__comment__btn"><i class="far fa-comment"></i></a> -->
      <div class="tweet__like__btn"><i class="far fa-heart"></i></div>
    </div>
    <div class="tweet__">テスト</div>
    <a href="{{ route('tweet.edit', $tweets->id) }}">編集</a>
    {!! Form::open(['route' => ['tweet.destroy', $tweets->id], 'method' => 'delete']) !!}
      <button>削除</button>
		{!! Form::close() !!}
    <!-- <a href="" class="tweet__comment">コメント一覧</a> -->
  </div>


@endsection