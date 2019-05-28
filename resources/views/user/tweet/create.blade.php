@extends('layout')
@section('content')

<div class="tweet-box">
<h2 class="tweet-create">tweet作成</h2>
<div class="tweet-wrap">
	{!!Form::open(['route' => 'tweet.store', 'method' => 'post'])!!}
		<div class="form-group">
			<!-- <input class="form-user__id" name="user_id" type="hidden" value = "Auth::id()"> -->
			{!! Form::input('hidden', 'user_id', Auth::id(), ['class' => 'form-user__id' ])!!}
			<select name='category_id' class = "form-select" id="pref_id">
        <option value="">Category</option>
        @foreach ($categories as $category)
					<option value= "{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<select name="subCategory_id" class="form-select">
				<option value="">SubCategory</option>
					@foreach ($subCategories as $subCategory)
						<option value="{{ $subCategory->id }}">{{ $subCategory->content }}</option>
					@endforeach	
			</select>
			<span class="require">*(入力必須)</span>
			<textarea name="content" class="form-module form-content" cols="100" rows="20" placeholder="本文を記入してください(400文字以内)"></textarea>
			<input type="text" class="form-module form-text" name="name" placeholder="タグを記入してください">
			<input type="submit" class="form-submit" value="post">
		</div>
	{!!Form::close()!!}
</div>
</div>

@endsection