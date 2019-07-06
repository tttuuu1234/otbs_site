@extends('admin.secondLayout')
@section('content')			
<div class="tag-ranking-header">
	<div class="tag-header-daily__text">
		<h2 class="tag-ranking__title">今日のランキング総合</h2>
	</div>
</div>

<div class="contents">
	<div class="main-contents">
		@if(!empty($theOtherDaysTagCounts))
			<div class="daily-tag-ranking">
				@foreach ($theOtherDaysTagCounts as $daily)
					<div class="tag-container">
						<div class="tag-number">{{$daily->id }}位</div>
						<div class="tag-name"><a href="{{ route('admin.tag.index', $daily->tag_id) }}">{{ $daily->name }}</a></div>
					</div>
				@endforeach
			</div>
		@endif

		@if(!empty($lastWeekTags))	
			<div class="weekly-tag-ranking">
				@foreach ($lastWeekTags as $lastWeek)
					<div class="tag-container">
						<div class="tag-number">{{$lastWeek->id }}位</div>
						<div class="tag-name"><a href="{{ route('admin.tag.index', $lastWeek->tag_id) }}">{{ $lastWeek->name }}</a></div>
					</div>
				@endforeach	
			</div>
		@endif	

		@if(!empty($lastMonthTags))	
			<div class="monthly-tag-ranking">
				@foreach ($lastMonthTags as $lastMonth)
					<div class="tag-container">
						<div class="tag-number">{{$lastMonth->id }}位</div>
						<div class="tag-name"><a href="{{ route('admin.tag.index', $lastMonth->tag_id) }}">{{ $lastMonth->name }}</a></div>
					</div>
				@endforeach
			</div>
		@endif
	</div>

		<div class="side-contents side-border">
			<ul class="side-tag-ranking current">
				<li><i class="fas fa-crown"></i><a href="{{ route('admin.tag.ranking.daily') }}" class="side-ranking-name">ランキング総合</a>
					<div class="sub-link-lists">
						<a href="{{ route('admin.tag.ranking.daily') }}" id="tag-daily" class="sub-link">今日</a>
						<a href="{{ route('admin.tag.ranking.weekly') }}" id="tag-weekly" class="sub-link">週間</a>
						<a href="{{ route('admin.tag.ranking.monthly') }}" id="tag-monthly" class="sub-link">月間</a>
					</div>
				</li>
			</ul>
		</div>
</div>
@endsection