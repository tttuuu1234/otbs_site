@extends('layout')
@section('content')

<div class="tweet-box is-padding inner">
		<div class="my-name">
			{{ $users->name }}のお気に入り
		</div>
		@foreach ($users->tweets as $tweet)<!--中間テーブルにアクセスしてそのuserがいいねを押したtweetの情報を取り出す-->
			<div　class="favorite-box">
				<div class="favorite__user__name"></div>
				<div class="favorite__user__content">{{ $tweet->content }}</div>		
			</div>			
		@endforeach
</div>
@endsection