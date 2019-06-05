@extends('layout')
@section('content')

<div class="tweet-box is-padding inner">
	<div　class="favorite-box">
		<div class="favorite__user__name">
			{{ $users->name }}のお気に入り
		</div>
		@foreach ($users->tweets as $user)
			{{ $user->content }}
		@endforeach

	</div>
</div>
@endsection