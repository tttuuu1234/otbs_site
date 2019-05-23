@extends('layout')
@section('content')

<div class="tweet-box">
<h2 class="tweet-create">tweet作成</h2>
<div class="tweet-wrap">
	{!!Form::open(['route' => 'tweet.store', 'method' => 'post'])!!}
		<div class="form-group">
			<input class="form-user__id" name="user_id" type="hidden" value = "Auth::id()">
			<textarea name="content" class="form-module" cols="100" rows="20"></textarea>
			<input type="text" class="form-module" name="name">
			<input type="submit" class="form-submit" value="post">
		</div>
	{!!Form::close()!!}
</div>
</div>

@endsection