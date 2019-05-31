@extends('layout')
@section('content')

<div class="category-create is-padding">
	{!! Form::open(['route' => 'subCategory.store']) !!}
		<select name='category_id' class = "form-select" id="pref_id">
			<option value="">Category</option>
			@foreach ($categories as $category)
				<option value= "{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
		{!! Form::input('text', 'content') !!}
		<button>post</button>
	{!! Form::close() !!}
</div>

@endsection