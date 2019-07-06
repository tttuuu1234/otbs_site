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
      <div class="tweet-header__title"><a href="{{route('admin.tweet.index') }}">Spit learning</a></div>
      <ul class="tweet-header__list">
          <li>
            <a href="#" class="tweet-header__list__item link__hover"><i class="fas fa-info-circle"></i></a>
            <div class="content__hover">SNS</div>
          </li>
          <li>
            <a href="#" class="tweet-header__list__item link__hover"><i class="far fa-envelope-open"></i></a>
            <div class="content__hover">contact</div>
          </li>
          <li>
            <a href="{{route('admin.tweet.create')}}" class="tweet-header__list__item link__hover"><i class="fas fa-plus-square"></i></a>
            <div class="content__hover">Tweet作成</div>
          </li>
          <li>
            <a href="{{ route('admin.categorize.create') }}" class="tweet-header__list__item link__hover" ><i class="fas fa-cart-plus"></i></a>
            <div class="content__hover">カテゴリー作成</div>
          </li>
          <li>
            <a href="{{ route('admin.subCategory.create') }}" class="tweet-header__list__item link__hover"><i class="fas fa-calendar-plus"></i></a>
            <div class="content__hover">サブカテゴリー作成</div>
          </li>

          <li>
            <a class="tweet-header__list__item" href="{{ route('admin.tweet.mypage', Auth::user()->id) }}">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            
            <a class="tweet-header__list__item" href="{{ route('admin.logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('adminLogout') }}
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
      </ul>
    </div>
  </header>

  <main class="inner tweet-box">
			@if(isset($categories))
				<nav class="nav">
					<ul class=" inner nav__list">
						<li class="nav__list__item"><a href="{{ route('admin.tweet.index') }}">全記事</a></li>
						@foreach ($categories as $category)
							<li class="nav__list__item category-link-{{ $category->id }}">
								<a href="{{ route('admin.category.index', $category->id) }}">{{ $category->name }}</a>
								<div class="sub__nav__list is-hidden">
									<ul class="sub__nav__list__items category-{{ $category->id }} inner">
										@foreach ($category->subCategory as $subCategory)
											<li class="sub__nav__list__item"><a href="{{ route('admin.subCategory.index', $subCategory->id) }}">{{ $subCategory->content }}</a></li>
										@endforeach
									</ul>      
								</div>
							</li>     
						@endforeach
						<li class="nav__list__item"><a href="{{ route('admin.tag.ranking.daily') }}">ランキング</a></li>
					</ul>
			</nav>
			@endif
				@yield('content')
  </main>

  <footer class="footer">
    <div class="tweet-footer-box inner">
      <div class="tweet-footer__title">Spit learningについて</div>
      <ul class="tweet-footer__list">
        <li><a href="{{ route('admin.favorite.index') }}" class="footer__list__item">お気に入りランキング一覧</a></li>
        <li><a href="{{ route('admin.tag.ranking.daily') }}" class="footer__list__item">タグランキング一覧</a></li>
        <li><a href="{{ route('admin.category.list') }}" class="footer__list__item">カテゴリ一覧</a></li>
      </ul>
    </div>
  </footer>
</body>
</html>