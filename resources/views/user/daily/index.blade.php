@extends('layout')
@section('content')
<div class="monthly-container is-padding">
    @foreach ($theOtherDaysTagCounts as $daily)
      {{ $daily->name }}
    @endforeach
</div>
@endsection