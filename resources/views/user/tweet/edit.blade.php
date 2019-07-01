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
</div>

@endsection