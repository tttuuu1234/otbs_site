@extends('admin.noSideContentsLayout')
@section('content')
<div class="favorite-box">
	@foreach($favorites as $favorite)
	<div class="favorite">
		<div>{{ $favorite->content }}</div>
	</div>
	@endforeach
</div>
@endsection