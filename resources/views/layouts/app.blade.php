<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('assets/js/costom.js') }}"></script>
  <title>Spit learning</title>
</head>
<body class="body">
  <header class="header">
    <div class="tweet-header-wrap inner">
      <div class="tweet-header__title"><a href="{{route('tweet.index') }}">Spit learning</a></div>
      <ul class="tweet-header__list">
        <!-- Authentication Links -->
        @guest
          <li>
            <a href="#" class="tweet-header__list__item link__hover"><i class="fas fa-info-circle"></i></a>
            <div class="content__hover">SNS</div>
          </li>
          <li>
            <a href="#" class="tweet-header__list__item link__hover"><i class="far fa-envelope-open"></i></a>
            <div class="content__hover">contact</div>
          </li>
          <li><a class="tweet-header__list__item link__hover" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @if (Route::has('register'))
          <li><a class="tweet-header__list__item link__hover" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @endif
        @else
          <li>
            <a href="#" class="tweet-header__list__item link__hover"><i class="fas fa-info-circle"></i></a>
            <div class="content__hover">SNS</div>
          </li>
          <li>
            <a href="#" class="tweet-header__list__item link__hover"><i class="far fa-envelope-open"></i></a>
            <div class="content__hover">contact</div>
          </li>
          <li>
            <a href="{{route('tweet.create')}}" class="tweet-header__list__item link__hover"><i class="fas fa-plus-square"></i></a>
            <div class="content__hover">Tweet作成</div>
          </li>
          <li>
            <a href="{{ route('categorize.create') }}" class="tweet-header__list__item link__hover" ><i class="fas fa-cart-plus"></i></a>
            <div class="content__hover">カテゴリー作成</div>
          </li>
          <li>
            <a href="{{ route('subCategory.create') }}" class="tweet-header__list__item link__hover"><i class="fas fa-calendar-plus"></i></a>
            <div class="content__hover">サブカテゴリー作成</div>
          </li>

          <li>
            <a class="tweet-header__list__item" href="{{ route('tweet.mypage', Auth::user()->id) }}">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            
            <a class="tweet-header__list__item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </header>

  <main class="inner tweet-box">
		@yield('content')
  </main>

  <footer class="footer">
    <div class="tweet-footer-box inner">
      <div class="tweet-footer__title">ツバシーについて</div>
      <ul class="tweet-footer__list">
        <li><a href="#" class="footer__list__item">お気に入りランキング一覧</a></li>
        <li><a href="{{ route('tag.ranking.daily') }}" class="footer__list__item">タグランキング一覧</a></li>
        <li><a href="{{ route('category.list') }}" class="footer__list__item">カテゴリ一覧</a></li>
      </ul>
    </div>
  </footer>
</body>
</html>