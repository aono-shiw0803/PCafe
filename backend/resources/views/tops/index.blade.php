@extends('layouts.index')

@section('main')
<div class="tops-index-first">
  <h2>最近登録されたカフェ3選</h2>
  <div class="new-shops">
    @forelse($newShops as $newShop)
      <a href="http://localhost:8001/shops/{{$newShop->id}}">
        <ul>
        @if($newShop->image === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="/storage/{{$newShop->image}}"></li>
        @endif
          <li><i class="far fa-calendar-check">&nbsp;{{$newShop->created_at}}</i></li>
          @if($newShop->area === 'shibuya')
            <li>【渋谷】</li>
          @elseif($newShop->area === 'shijuku_yoyogi')
            <li>【新宿・代々木】</li>
          @endif
          <li>{{$newShop->name}}</li>
        </ul>
      </a>
    @empty
      <p class="empty">最近登録されたカフェはありません。</p>
    @endforelse
  </div>
</div>

<div class="tops-index-second">
  <div class="main-shops">
    @foreach($shops as $shop)
      <a href="http://localhost:8001/shops/{{$shop->id}}">
        <ul>
        @if($shop->image === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="/storage/{{$shop->image}}"></li>
        @endif
        @if($shop->area === 'shibuya')
          <li>【渋谷】</li>
        @elseif($shop->area === 'shijuku_yoyogi')
          <li>【新宿・代々木】</li>
        @endif
          <li>{{$shop->name}}</li>
        </ul>
      </a>
    @endforeach
  </div>
</div>
@endsection
