@extends('layout')
@section('content')
<div class="contents">
	<div class="main-contents">
		<div class="tweet__name ">{{ $tweet->user->name }}</div>
		<div class="tweet__photo">{{ $tweet->content }}</div>
		<div class="tweet-mini-box">
			<div class="tweet__comment__btn"><i class="far fa-comment"></i></div>
				<div class="comment-modal is-hidden">
					<div class="comment-text">
						{!! Form::open(['route' => 'comment.create']) !!} 
							<textarea name="comment" cols="50" rows="10" class="form-module"></textarea>
							{!! Form::input('hidden', 'user_id', Auth::id())!!}
							{!! Form::input('hidden', 'tweet_id', $tweet->id) !!}
							<input type="submit" class="form-submit" value="post">
						{!! Form::close() !!}
						<input type="submit" class="form-submit modal-close" value="close">
					</div>
				</div>
				{!! Form::open(['route' => 'tweet.like']) !!}
					{{ Form::input('hidden', 'tweet_id', $tweet->id) }}
					{{ Form::input('hidden', 'user_id', Auth::id()) }}
          <button type='submit' id="like-btn"><i class="far fa-heart"></i></button>
				{!! Form::close() !!}
				<div class="tweet__like__count">{{ $tweet->count }}</div>
		</div>				
		@foreach ($tweet->comment as $comment)
			<div class="tweet__comment">{{ $comment->comment }}</div>
		@endforeach
		<a href="{{ route('tweet.favorite', $tweet->user->id) }}">お気に入り</a>
		@if(Auth::id() == $tweet->user->id)
			<a href="{{ route('tweet.edit', $tweet->id) }}">編集</a>
			{!! Form::open(['route' => ['tweet.destroy', $tweet->id], 'method' => 'delete']) !!}
			<button>削除</button>
			{!! Form::close() !!}
		@endif

		<ul class="sub-category-box">
			@foreach ($category->subCategory as $subCategory)
				<li><a href="{{ route('subCategory.index', $subCategory->id) }}">{{ $subCategory->content }}</a></li>
			@endforeach	
		</ul>
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