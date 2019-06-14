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
  <title>tsubastagram</title>
</head>
<body class="body">
  <header class="otbs-header">
    <div class="otbs-header-wrap inner">
      <div class="otbs-header__title"><a href="{{route('top.index') }}">ツバシー</a></div>
      <ul class="otbs-header__list">
        <!-- Authentication Links -->
        @guest
          <li>
            <a href="#" class="otbs-header__list__item link__hover"><i class="fas fa-info-circle"></i></a>
            <div class="content__hover">SNS</div>
          </li>
          <li>
            <a href="#" class="otbs-header__list__item link__hover"><i class="far fa-envelope-open"></i></a>
            <div class="content__hover">contact</div>
          </li>
          <li><a class="otbs-header__list__item link__hover" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @if (Route::has('register'))
          <li><a class="otbs-header__list__item link__hover" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @endif
        @else
          <li>
            <a href="#" class="otbs-header__list__item link__hover"><i class="fas fa-info-circle"></i></a>
            <div class="content__hover">SNS</div>
          </li>
          <li>
            <a href="#" class="otbs-header__list__item link__hover"><i class="far fa-envelope-open"></i></a>
            <div class="content__hover">contact</div>
          </li>
          <li>
            <a href="{{route('tweet.create')}}" class="otbs-header__list__item link__hover"><i class="fas fa-plus-square"></i></a>
            <div class="content__hover">Tweet作成</div>
          </li>
          <li>
            <a href="{{ route('category.create') }}" class="otbs-header__list__item link__hover" ><i class="fas fa-cart-plus"></i></a>
            <div class="content__hover">カテゴリー作成</div>
          </li>
          <li>
            <a href="{{ route('subCategory.create') }}" class="otbs-header__list__item link__hover"><i class="fas fa-calendar-plus"></i></a>
            <div class="content__hover">サブカテゴリー作成</div>
          </li>

          <li>
            <a class="otbs-header__list__item" href="#">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            
            <a class="otbs-header__list__item" href="{{ route('logout') }}"
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

  <main class="otbs-main inner">
		@yield('content')
  </main>
</body>
</html>