@extends('layout')
@section('content')
<div class="category-create">
	{!! Form::open(['route' => 'category.store']) !!}
		{!! Form::input('text', 'name') !!}
		<button>post</button>
	{!! Form::close() !!}	
</div>

@endsection