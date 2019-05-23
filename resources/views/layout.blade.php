<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
      </ul>
    </div>

    <nav class="nav inner">
      <ul class="nav__list">
        <li class="nav__list__item"><a href="#">all</a></li>
        <li class="nav__list__item"><a href="#">エンタメ</a></li>
        <li class="nav__list__item"><a href="#">スポーツ</a></li>
        <li class="nav__list__item"><a href="#">お笑い</a></li>
        <li class="nav__list__item"><a href="#">動物</a></li>
        <li class="nav__list__item"><a href="#">美女</a></li>
      </ul>

      <ul class="nav__contents__list">
        <li class="nav__contents is-hidden"><a href="#">hello</a></li>
        <li class="nav__contents is-hidden"><a href="#">こんにちは</a></li>
        <li class="nav__contents is-hidden"><a href="#">何してるの</a></li>
        <li class="nav__contents is-hidden"><a href="#">遊んでるの</a></li>
        <li class="nav__contents is-hidden"><a href="#">いいなあ</a></li>
        <li class="nav__contents is-hidden"><a href="#">愛してる</a></li>
      </ul>
    </nav>
  </header>

  <main class="otbs-main inner">
		@yield('content')
  </main>
</body>
</html>