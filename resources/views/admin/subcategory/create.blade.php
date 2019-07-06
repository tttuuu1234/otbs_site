@extends('admin.noSideContentsLayout')
@section('content')
<div class="category-create">
	<h2>サブカテゴリー作成</h2>
	{!! Form::open(['route' => 'admin.subCategory.store']) !!}
	<div class="form-group @if(!empty($errors->first('category_id'))) has-error @endif">
		<span class="tweet-required">*</span>
		<span class="error-message">{{ $errors->first('category_id') }}</span>
			<select name='category_id' class = "form-module form-select" id="pref_id">
				<option value="">メインカテゴリーを選択してください</option>
				@foreach ($categories as $category)
					<option value= "{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
	</div>
	<div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
		<span class="tweet-required">*</span>
		<span class="error-message">{{ $errors->first('content') }}</span>
			{!! Form::input('text', 'content', null,['class' => 'form-module']) !!}
	</div>
	<div class="form-submit">
		<input type="submit" value="作成">
	</div>
	{!! Form::close() !!}
</div>
@endsection