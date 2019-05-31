@extends('layout')
@section('content')
<div class="weekly-container is-padding">
    @foreach ($lastWeekTags as $weekly)
      {{ $weekly->name }}
    @endforeach
</div>
@endsection