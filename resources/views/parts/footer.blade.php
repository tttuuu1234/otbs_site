@extends('layout')
@section('footer')
    <div class="tweet-footer-box inner">
      <div class="tweet-footer__title">Spit learningについて</div>
      <ul class="tweet-footer__list">
        <li><a href="#" class="footer__list__item">お気に入りランキング一覧</a></li>
        <li><a href="{{ route('tag.ranking.daily') }}" class="footer__list__item">タグランキング一覧</a></li>
        <li><a href="{{ route('category.list') }}" class="footer__list__item">カテゴリ一覧</a></li>
      </ul>
    </div>
@endsection