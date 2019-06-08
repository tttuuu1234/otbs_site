@extends('layout')
@section('content')

<div class="tweet-box is-padding">
<h2 class="tweet-create">tweet作成</h2>
<div class="tweet-wrap">
	{!!Form::open(['route' => 'tweet.store'])!!}
		<div class="form-group">
			<!-- <input class="form-user__id" name="user_id" type="hidden" value = "Auth::id()"> -->
			{!! Form::input('hidden', 'user_id', Auth::id(), ['class' => 'form-user__id' ])!!}
			<select name='category_id' class = "form-select" id="pref_id">
        <option>Category</option>
        @foreach ($categories as $category)
					<option value= "{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<span></span>
			<select name="subCategory_id" class="form-select">
				<option value="">SubCategory</option>
					@foreach ($subCategories as $subCategory)
						<option value="{{ $subCategory->id }}">{{ $subCategory->content }}</option>
					@endforeach	
			</select>
			<span></span>
		</div>
		<div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
			<span class="require">*(入力必須)</span>
			<textarea name="content" class="form-module form-content" cols="100" rows="20" placeholder="本文を記入してください(400文字以内)"></textarea>
			<span class="error-message">{{ $errors->first('content') }}</span>
		</div>
		<div class="form-group">
			<input type="text" class="form-module form-text" name="name" placeholder="タグを記入してください">
			<input type="hidden" name="count" value=0>
			<span></span>
		</div>
			<input type="submit" class="form-submit" value="post">
	{!!Form::close()!!}
</div>
</div>

@endsection