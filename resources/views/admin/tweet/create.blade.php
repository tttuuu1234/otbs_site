@extends('admin.noSideContentsLayout')
@section('content')
<div class="tweet-create">
<h2>tweet作成</h2>
<div class="tweet-wrap">
	{!!Form::open(['route' => 'admin.tweet.store'])!!}
		<div class="form-group @if(!empty($errors->first('category_id'))) has-error @endif">
			{!! Form::input('hidden', 'user_id', Auth::id() )!!}
			<span class="tweet-required">*</span>
			<span class="error-message">{{ $errors->first('category_id') }}</span>
			<select name='category_id' class = "form-select form-module">
        <option value="">メインカテゴリー</option>
				@foreach ($categories as $category)
					<option value= "{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			</div>
				<div class="form-group @if(!empty($errors->first('subCategory_id'))) has-error @endif">
					<span class="tweet-required">*</span>
					<span class="error-message">{{ $errors->first('subCategory_id') }}</span>
					<select name="subCategory_id" class="form-select form-module">
						<option value="">サブカテゴリー</option>
							@foreach ($subCategories as $subCategory)
								<option value="{{ $subCategory->id }}">{{ $subCategory->content }}</option>
							@endforeach	
					</select>
				</div>
		<div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
			<span class="tweet-required">*</span>
			<span class="error-message">{{ $errors->first('content') }}</span>
			<textarea name="content" class="form-module form-content" cols="80" rows="20" placeholder="本文を記入してください(400文字以内)"></textarea>
		</div>
		<div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
			<span class="tweet-required">*</span>
			<span class="error-message">{{ $errors->first('name') }}</span>
			<input type="text" class="form-module" name="name" placeholder="タグを記入してください">
			<input type="hidden" name="count" value=0>
		</div>
		<div class="form-submit">
			<input type="submit" value="tweet">
		</div>
	{!!Form::close()!!}
</div>
</div>
@endsection