@extends('layout')
@section('content')
<div class="monthly-container is-padding">
    @foreach ($lastMonthTags as $monthly)
      {{ $monthly->name }}
    @endforeach
</div>
@endsection