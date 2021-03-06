<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name=”robots” content=”noindex”>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <script src="/js/main.js"></script>
  <title>PCafe</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  @if(session('flash_message'))
    <div class="flash">
      <p>{{session('flash_message')}}</p>
    </div>
  @endif
  <div class="black-bg">
  </div>
  <div class="sidebar">
    <ul>
      <li id="close"><i class="fas fa-times"></i></li>
      <li class="main-tema">ーエリアから探すー
        <ul class="sub-tema">
          @foreach(config('AreaData.areas') as $area)
            <li><a href="{{route('shops.area', ['area' => $area['url']])}}">{{$area['name']}}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="main-tema">ーテーマから探すー
        <ul class="sub-tema">
          @foreach(config('TemaData.temas') as $tema)
            <li><a href="{{route('shops.tema', ['tema' => $tema['url']])}}">{{$tema['name']}}</a></li>
          @endforeach
        </ul>
      </li>
    </ul>
  </div>

  <div class="top">
    <ul>
      @guest
        <li><a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i>ログイン</a></li>
        @if(Route::has('register'))
          <li><a href="{{route('register')}}"><i class="fas fa-user-plus"></i>新規登録</a></li>
        @endif
      @else
      <li>ログイン中：<a href="{{route('users.show', ['user' => Auth::User()->id])}}">{{Auth::User()->name}}</a></li>
      <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
      @endguest
    </ul>
  </div>

  @yield('breadcrumbs')

  <header style="background-image:url('/storage/{{$headerBgs}}.jpg')">
    <div class="header-text">
      <h1><a href="{{route('tops.index')}}">PCafe</a></h1>
      <h2>ー 快適にパソコン作業ができるカフェライブラリ ー</h2>
    </div>
  </header>

  <nav>
    <ul>
      <li><i id="open" class="fas fa-bars"></i></li>
      <li><a href="{{route('tops.index')}}">TOP</a></li>
      <li><a href="{{route('shops.index')}}">カフェ一覧</a></li>
      @if(Auth::User())
        <li><a href="{{route('shops.create')}}">カフェ登録</a></li>
        <li><a href="{{route('posts.index')}}">スケジュール一覧</a></li>
        <li><a href="{{route('users.index')}}">ユーザー一覧</a></li>
        <li><a href="{{route('users.show', ['user' => Auth::User()->id])}}">マイページ</a></li>
      @else
        <li><a href="{{route('contacts.create')}}">お問い合わせ</a></li>
      @endif
    </ul>
  </nav>

  <main>
    <div class="content">
      @yield('main')
    </div>
    <div class="right-side">
      <ul>
        <li class="search">エリアから探す</li>
        @foreach(config('ShopData.areas') as $area)
          <li><a href="{{route('shops.area', ['area' => $area['url']])}}">{{$area['name']}}</a></li>
        @endforeach
      </ul>
      <ul>
        <li class="search">テーマから探す</li>
        @foreach(config('TemaData.temas') as $tema)
          <li><a href="{{route('shops.tema', ['tema' => $tema['url']])}}">{{$tema['name']}}</a></li>
        @endforeach
      </ul>
      <ul>
        <li class="search">その他</li>
        <li><a href="{{route('photos.index')}}">写真から探す</a></li>
        @if(Auth::User())
          <li><a href="{{route('users.favorite', ['user' => Auth::User()->id])}}">お気に入りに登録したカフェ</a></li>
        @endif
        <li><a href="{{route('shops.ranking')}}">人気のカフェ9選</a></li>
        <li><a href="{{route('shops.createdAt')}}">1カ月以内に登録されたカフェ</a></li>
        <li><a href="{{route('shops.updatedAt')}}">1カ月以内に更新されたカフェ</a></li>
      </ul>
    </div>
  </main>

  <!-- <footer>
    <h2><a href="{{route('tops.index')}}">PCafe</a></h2>
    <ul>
      <li>© 2021 PCafe All Rights Reserved</li>
      <li><a target="_blank" href="#">プライバシーポリシー</a></li>
      <li><a href="{{route('contacts.create')}}">お問い合わせ</a></li>
    </ul>
  </footer> -->
</body>

</html>
