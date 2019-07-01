@extends('noSideContentsLayout')
@section('content')
<div class="category-create">
	<h2>メインカテゴリー作成</h2>
	{!! Form::open(['route' => 'categorize.store']) !!}
		<div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
			<span class="tweet-required">*</span>
			<span class="error-message">{{ $errors->first('name') }}</span>
				{!! Form::input('text', 'name', null,['class' => 'form-module']) !!}
		</div>
		<div class="form-submit">
			{!! Form::input('submit', 'submit', '作成') !!}
		</div>
	{!! Form::close() !!}
</div>
@endsection