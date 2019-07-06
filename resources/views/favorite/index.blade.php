@extends('noSideContentsLayout')
@section('content')
<div class="favorite-box">
	@foreach($favorites as $favorite)
	<div class="favorite">
		<p class="favorite__ranking">{{ $favorite->ranking }}位</p>
		<p class="favorite__name">{{ $favorite->content }}</p>
	</div>
	@endforeach
</div>
@endsection