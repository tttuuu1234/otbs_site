@extends('layout')
@section('content')
<nav class="nav">
  <ul class="nav__list">
    <li class="nav__list__item nav-category"><a href="{{ route('tweet.index') }}">全記事</a></li>
      @foreach ($categories as $category)
        <li class="nav__list__item">
          <a href="{{ route('category.index', $category->id) }}">{{ $category->name }}</a>
          <div class="sub__nav__list is-hidden">
						<ul class="sub__nav__list__items inner">
							@foreach ($category->subCategory as $subCategory)
								<li class="sub__nav__list__item"><a href="{{ route('subcategory.index', $subCategory->id) }}">{{ $subCategory->content }}</a></li>
							@endforeach
						</ul>      
        	</div>
        </li>     
      @endforeach
    <li class="nav__list__item"><a href="">ランキング</a></li>
  </ul>
</nav>
			
<div class="tag-ranking-header">
	<div class="tag-header-daily__text">
		<h2 class="tag-ranking__title">今日のランキング総合</h2> <!--javascriptでtextを月間、週間と変えている？-->
		<p class="tag-ranking__description">1日間のツバシー全タグ中のユーザーに最も人気になったタグです！気になったタグを是非検索してみしてみませんか？</p>
	</div>
	<div class="tag-header-weekly__text">
		<h2 class="tag-ranking__title">週間のランキング総合</h2> <!--javascriptでtextを月間、週間と変えている？-->
		<p class="tag-ranking__description">1週間のツバシー全タグ中のユーザーに最も人気になったタグです！気になったタグを是非検索してみしてみませんか？</p>
	</div>
	<div class="tag-header-monthly__text">
		<h2 class="tag-ranking__title">月間のランキング総合</h2> <!--javascriptでtextを月間、週間と変えている？-->
		<p class="tag-ranking__description">1ヶ月間のツバシー全タグ中のユーザーに最も人気になったタグです！気になったタグを是非検索してみしてみませんか？</p>
	</div>
</div>


<div class="contents">
	<div class="main-contents">
		@if(!empty($theOtherDaysTagCounts))
			<div class="daily-tag-ranking">
				@foreach ($theOtherDaysTagCounts as $daily)
					<div class="tag-container">
						<div class="tag-number">{{$daily->id }}位</div>
						<div class="tag-name"><a href="{{ route('tag.index', $daily->tag_id) }}">{{ $daily->name }}</a></div>
					</div>
				@endforeach
			</div>
		@endif

		@if(!empty($lastWeekTags))	
			<div class="weekly-tag-ranking">
				@foreach ($lastWeekTags as $lastWeek)
					<div class="tag-container">
						<div class="tag-number">{{$lastWeek->id }}位</div>
						<div class="tag-name"><a href="{{ route('tag.index', $lastWeek->tag_id) }}">{{ $lastWeek->name }}</a></div>
					</div>
				@endforeach	
			</div>
		@endif	

		@if(!empty($lastMonthTags))	
			<div class="monthly-tag-ranking">
				@foreach ($lastMonthTags as $lastMonth)
					<div class="tag-container">
						<div class="tag-number">{{$lastMonth->id }}位</div>
						<div class="tag-name"><a href="{{ route('tag.index', $lastMonth->tag_id) }}">{{ $lastMonth->name }}</a></div>
					</div>
				@endforeach
			</div>
		@endif
	</div>

		<div class="side-contents side-border">
			<ul class="side-tag-ranking current">
				<li><i class="fas fa-crown"></i><a href="{{ route('tag.ranking.daily') }}" class="side-ranking-name">ランキング総合</a>
					<div class="sub-link-lists">
						<a href="{{ route('tag.ranking.daily') }}" id="tag-daily" class="sub-link">今日</a>
						<a href="{{ route('tag.ranking.weekly') }}" id="tag-weekly" class="sub-link">週間</a>
						<a href="{{ route('tag.ranking.monthly') }}" id="tag-monthly" class="sub-link">月間</a>
					</div>
				</li>
			</ul>
		</div>
</div>
@endsection