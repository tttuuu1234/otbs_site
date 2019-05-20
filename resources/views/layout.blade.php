<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <title>tsubastagram</title>
</head>
<body class="body">
  <header class="otbs-header">
    <div class="otbs-header-wrap inner">
      <div class="otbs-header__title">tsubastagram</div>
      <ul class="otbs-header__list">
        <li><a href="#" class="otbs-header__list__item"><i class="fas fa-info-circle"></i></a></li>
        <li><a href="#" class="otbs-header__list__item"><i class="far fa-envelope-open"></i></a></li>
        <li><a href="{{route('tweet.create')}}" class="otbs-header__list__item"><i class="fas fa-plus-square"></i></a></li>
      </ul>
    </div>
  </header>

  <main class="otbs-main inner">
		@yield('content')
  </main>
</body>
</html>