@extends('layout')
@section('content')

<div class="tweet-box is-padding inner">	
  <div class="tweet-header">
    <div class="tweet__name ">{{ $tweets->user->name }}</div>
	</div>
  <div class="tweet__photo">{{ $tweets->content }}</div>
  <div class="tweet-mini-box">
		<a href="#" class="tweet__comment__btn"><i class="far fa-comment"></i></a>
			<div class="comment-modal is-hidden">
				<div class="comment-text">
					{!! Form::open(['route' => 'comment.create']) !!} 
						<textarea name="comment" cols="50" rows="10" class="form-module"></textarea>
						{!! Form::input('hidden', 'user_id', Auth::id())!!}
						{!! Form::input('hidden', 'tweet_id', $tweets->id) !!}
						<input type="submit" class="form-submit" value="post">
					{!! Form::close() !!}
					<input type="submit" class="form-submit modal-close" value="close">
				</div>
			</div>
		<div class="tweet__like__btn"><i class="far fa-heart"></i></div>
	</div>				
	@foreach ($tweets->comment as $comment)
		<div class="tweet__comment">{{ $comment->comment }}</div>
	@endforeach
	<a href="{{ route('tweet.favorite', $tweets->user->id) }}">お気に入り</a>
	@if(Auth::id() == $tweets->user->id)
		<a href="{{ route('tweet.edit', $tweets->id) }}">編集</a>
		{!! Form::open(['route' => ['tweet.destroy', $tweets->id], 'method' => 'delete']) !!}
		<button>削除</button>
	@endif	
	{!! Form::close() !!}
</div>
@endsection