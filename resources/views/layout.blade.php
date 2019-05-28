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
      <div class="otbs-header__title"><a href="{{ route('tweet.index') }}">tsubastagram</a></div>
      <ul class="otbs-header__list">
        <li><a href="#" class="otbs-header__list__item link__hover"><i class="fas fa-info-circle"></i></a></li>
        <li><a href="#" class="otbs-header__list__item link__hover"><i class="far fa-envelope-open"></i></a></li>
        <li><a href="{{route('tweet.create')}}" class="otbs-header__list__item link__hover"><i class="fas fa-plus-square"></i></a></li>
        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
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