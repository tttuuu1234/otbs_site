@extends('layout')
@section('content')
	<div>
		@foreach ($tweets as $tweet)
			{{ $tweet->content }}
		@endforeach
	</div>
@endsection