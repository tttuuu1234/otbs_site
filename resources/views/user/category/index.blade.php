@extends('layout')
@section('content')

<div class="contents">
  <div class="categories inner">
		<div class="categories__title"><h2>カテゴリー覧</h2></div>
		<div class="category-box">
			<p class="category__title">メインカテゴリー</p>
			<div class="category-links">
				@foreach ($categoryLists as $category)
					<div class="category-name"><a href="{{ route('category.index', $category->id) }}">{{ $category->name }}</a></div>
				@endforeach
			</div>	
		</div>
		<div class="category-box">
			<p class="category__title">サブカテゴリー</p>
			<div class="category-links">
				@foreach ($subCategoryLists as $subCategory)
					<div class="category-name"><a href="{{ route('subCategory.index', $subCategory->id) }}">{{ $subCategory->content }}</a></div>
				@endforeach	
			</div>	
		</div>
	</div>
</div>

@endsection