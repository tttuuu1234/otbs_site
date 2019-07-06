@extends('layouts')
@section('header')
  @parent
  <div class="tweet-header-wrap inner">
    <div class="tweet-header__title"><a href="{{route('tweet.index') }}">Spit learning</a></div>
    <ul class="tweet-header__list">
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

@endsection