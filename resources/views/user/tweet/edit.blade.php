@extends('layout')
@section('content')
<div class="tweet-box">
	<div class="tweet-wrap">
		{!!Form::open(['route' => ['tweet.update', $tweet->id], 'method' => 'PUT'])!!}
			<div class="form-group">
				<!-- <input class="form-user__id" name="user_id" type="hidden" value ="Auth::id()"> -->
				{!! Form::input('hidden', 'user_id', Auth::id(), ['class' => 'form-user__id'])!!}
				<textarea name="content" class="form-module" cols="100" rows="20">{{ $tweet->content }}</textarea>
				<input type="submit" class="form-submit" value="post">
			</div>
		{!!Form::close()!!}
	</div>

<!-- <li class="nav__list__item">
          <a href="#">all</a>
          <ul class="nav__contents__list">
            <li class="nav__contents is-hidden"><a href="#">hello</a></li>
          </ul>  
        </li>
        <li class="nav__list__item">
          <a href="#">エンタメ</a>
          <ul class="nav__contents__list">
            <li class="nav__contents is-hidden"><a href="#">hello</a></li>
          </ul>  
        </li>
        <li class="nav__list__item">
          <a href="#">スポーツ</a>
          <ul class="nav__contents__list">
            <li class="nav__contents is-hidden"><a href="#">やりたい</a></li>
          </ul>  
        </li>
        <li class="nav__list__item">
          <a href="#">お笑い</a>
          <ul class="nav__contents__list">
            <li class="nav__contents is-hidden"><a href="#">面白くない</a></li>
          </ul>  
        </li>
        <li class="nav__list__item">
          <a href="#">美人</a>
          <ul class="nav__contents__list">
            <li class="nav__contents is-hidden"><a href="#">会いたい</a></li>
          </ul>  
        </li>
        <li class="nav__list__item">
          <a href="#">麻美ゆま</a>
          <ul class="nav__contents__list">
            <li class="nav__contents is-hidden"><a href="#">神だ</a></li>
          </ul>  
        </li>
 -->

  </div>

@endsection