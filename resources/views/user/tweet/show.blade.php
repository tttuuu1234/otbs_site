@extends('layout')
@section('content')
<div class="contents">
	<div class="main-contents">
		<div class="tweet__name tweet-module">{{ $tweet->user->name }}</div>
		<div class="tweet__content tweet-module">{{ $tweet->content }}</div>
		<div class="tweet-inner">
			<div class="tweet__like"><a href="{{ route('tweet.like', $tweet->id) }}"><i class="far fa-heart"></i></a>{{ $tweet->count }}</div>
			<div class="tweet__comment-btn tweet-module"><i class="far fa-comment"></i></div>
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
				<div class="tweet__favorite"><a href="{{ route('tweet.favorite', $tweet->user->id) }}"><i class="far fa-star"></i></a></div>
		</div>
		@if(Auth::id() == $tweet->user->id)
		<div class="auth-area tweet-module">
			<div class="tweet-edit"><a href="{{ route('tweet.edit', $tweet->id) }}"><button class="btn-edit">編集</button></a></div>
			{!! Form::open(['route' => ['tweet.destroy', $tweet->id], 'method' => 'delete']) !!}
				{!! Form::input('submit', 'submit', '削除', ['class' => 'btn-delete']) !!}
			{!! Form::close() !!}
		</div>
		@endif

		<ul class="category-lists">
			<div class="tweet__category tweet-module">
				<div class="name">メインカテゴリー<i class="far fa-hand-point-right"></i></div>
				<a href="{{ route('category.index', $tweet->category_id) }}">{{ $tweet->category->name }}</a>
			</div>
			<div class="tweet__category tweet-module">
				<div class="name">サブカテゴリー<i class="far fa-hand-point-right"></i></div>
				<a href="{{ route('subCategory.index', $tweet->subCategory_id) }}">{{ $tweet->subCategory->content }}</a>
			</div>
		</ul>

		@if(!empty($tweet->comment))
		<div class="tweet-module">
			<div class="comments" id="comment-counts">{{ $tweet->comment->count() }}件のコメントを表示</div>
			<div class="comment-area">
				@foreach ($tweet->comment as $comment)
					<div class="comment__name">{{ $comment->user->name }}</div>
					<div class="tweet__comment tweet-module">{{ $comment->comment }}</div>
				@endforeach
			</div>
		</div>
		@endif

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