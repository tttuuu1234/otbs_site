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
  @if(Auth::guard('admin')->check())
    <header class="header">
      <div class="tweet-header-wrap inner">
        <div class="tweet-header__title"><a href="{{route('admin.tweet.index') }}">Spit learning</a></div>
        <ul class="tweet-header__list">
          <!-- Authentication Links -->
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
              <div class="tweet-header__list__item">{{ Auth::user()->name }}</div>              
            </li>

            <li>
              <a class="tweet-header__list__item" href="{{ route('admin.logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
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
                <li class="nav__list__item"><a href="{{ route('tag.ranking.daily') }}">ランキング</a></li>
              </ul>
          </nav>
          @endif
        <div class="contents">
          @yield('content')
          <div class="side-contents">
            <h3 class="side-ranking__title">お気に入りランキング総合</h3>
            <p class="side-ranking__read">最近人気のあった記事</p>
            <div class="side-ranking">
              <ul class="side-inner">
              @if(isset($favorites))
              @foreach ($favorites as $favorite)
                <li class="side-favorite-list">
                  <div class="side-favorite-rank is-favorite">{{ $favorite->ranking }}位</div>
                  <div class="side-favorite-content is-favorite">{{ $favorite->content }}</div>
                  <div class="side-favorite-count is-favprite">{{ $favorite->count }}fav</div>
                </li>
                @endforeach
              @endif  
              </ul>
            </div>
          </div>
        </div>
    </main>

    <footer class="footer">
      <div class="tweet-footer-box inner">
        <div class="tweet-footer__title">Spit learningについて</div>
        <ul class="tweet-footer__list">
          <li><a href="#" class="footer__list__item">お気に入りランキング一覧</a></li>
          <li><a href="{{ route('admin.tag.ranking.daily') }}" class="footer__list__item">タグランキング一覧</a></li>
          <li><a href="{{ route('admin.category.list') }}" class="footer__list__item">カテゴリ一覧</a></li>
        </ul>
      </div>
    </footer>
  @endif    
</body>
</html>