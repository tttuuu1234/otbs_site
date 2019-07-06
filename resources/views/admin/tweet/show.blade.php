@extends('admin.layout')
@section('content')
	<div class="main-contents">
		<div class="tweet__name tweet-module">{{ $tweet->user->name }}</div>
		<div class="tweet__content tweet-module">{{ $tweet->content }}</div>
		<div class="tweet-inner">
			<div class="tweet__like"><a href="{{ route('admin.tweet.like', $tweet->id) }}"><i class="far fa-heart"></i></a>{{ $tweet->count }}</div>
			<div class="tweet__comment-btn tweet-module"><i class="far fa-comment"></i></div>
				<div class="comment-modal is-hidden">
					<div class="comment-box">
						<div class="comment-close">
							<div class="modal-close"><i class="fas fa-times"></i></div>
						</div>
						{!! Form::open(['route' => 'admin.comment.create']) !!}
							<textarea name="comment" cols="50" rows="10" class="form-module comment-textarea"></textarea>
							{!! Form::input('hidden', 'user_id', Auth::id())!!}
							{!! Form::input('hidden', 'tweet_id', $tweet->id) !!}
							<div class="comment-submit">
								{!! Form::input('submit', 'submit', 'post', ['class' => 'btn'])!!}
							</div>
						{!! Form::close() !!}
					</div>
				</div>
				<div class="tweet__favorite"><a href="{{ route('admin.tweet.favorite', $tweet->user->id) }}"><i class="far fa-star"></i></a></div>
		</div>
		<div class="auth-area tweet-module">
			<div class="tweet-edit"><a href="{{ route('admin.tweet.edit', $tweet->id) }}"><button class="btn-edit">編集</button></a></div>
			{!! Form::open(['route' => ['admin.tweet.destroy', $tweet->id], 'method' => 'delete']) !!}
				{!! Form::input('submit', 'submit', '削除', ['class' => 'btn-delete']) !!}
			{!! Form::close() !!}
		</div>

		<ul class="category-lists">
			<div class="tweet__category tweet-module">
				<div class="name">メインカテゴリー<i class="far fa-hand-point-right"></i></div>
				<a href="{{ route('admin.category.index', $tweet->category_id) }}">{{ $tweet->category->name }}</a>
			</div>
			<div class="tweet__category tweet-module">
				<div class="name">サブカテゴリー<i class="far fa-hand-point-right"></i></div>
				<a href="{{ route('admin.subCategory.index', $tweet->subCategory_id) }}">{{ $tweet->subCategory->content }}</a>
			</div>
		</ul>

		@if(!empty($tweet->comment))
		<div class="tweet-module">
			<div class="comments" id="comment-counts">{{ $tweet->comment->count() }}件のコメントを表示</div>
			<div class="comments-box">
				@foreach ($tweet->comment as $comment)
					<div class="comment-area">
						<div class="comment__name">{{ $comment->user->name }}</div>
						<div class="comment">{{ $comment->comment }}</div>
					</div>
				@endforeach
			</div>
		</div>
		@endif
	</div>
@endsection