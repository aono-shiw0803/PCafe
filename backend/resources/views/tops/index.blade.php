@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('top'))

@section('main')
<div class="tops-index-first">
  <h2>最近登録されたカフェ3選</h2>
  <div class="new-shops">
    @foreach($newShops as $newShop)
      <a href="{{route('shops.show', ['shop' => $newShop->id])}}">
        <ul class="facility">
          @if($newShop->wifi === 0)
            <li><i class="fas fa-wifi"></i></li>
          @else
            <li class="opacity"><i class="fas fa-wifi"></i></li>
          @endif
          @if($newShop->outlet === 0)
            <li><i class="fas fa-battery-full"></i></li>
          @else
            <li class="opacity"><i class="fas fa-battery-full"></i></li>
          @endif
          @if($newShop->credit === 0)
            <li><i class="far fa-credit-card"></i></li>
          @else
            <li class="opacity"><i class="far fa-credit-card"></i></li>
          @endif
          @if($newShop->smoke === 1)
            <li><i class="fas fa-smoking-ban"></i></li>
          @else
            <li class="opacity"><i class="fas fa-smoking-ban"></i></li>
          @endif
          @if($newShop->pet === 0)
            <li><i class="fas fa-dog"></i></li>
          @else
            <li class="opacity"><i class="fas fa-dog"></i></li>
          @endif
          @if($newShop->liquor === 0)
            <li><i class="fas fa-glass-martini-alt"></i></li>
          @else
            <li class="opacity"><i class="fas fa-glass-martini-alt"></i></li>
          @endif
        </ul>
        <ul class="detail">
        @if($newShop->image === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="{{$newShop->image}}"></li>
        @endif
          <li><i class="far fa-calendar-check">&nbsp;{{$newShop->created_at->format('Y-m-d')}}</i></li>
          <li>【{{$newShop->getAreaNameJpn()}}】</li>
          <li>{{$newShop->name}}</li>
        </ul>
      </a>
    @endforeach
  </div>
</div>

<div class="tops-index-second">
  <div class="main-shops">
    @foreach($shops as $shop)
      <a href="{{route('shops.show', ['shop' => $shop->id])}}">
        <ul class="facility">
          @if($shop->wifi === 0)
            <li><i class="fas fa-wifi"></i></li>
          @else
            <li class="opacity"><i class="fas fa-wifi"></i></li>
          @endif
          @if($shop->outlet === 0)
            <li><i class="fas fa-battery-full"></i></li>
          @else
            <li class="opacity"><i class="fas fa-battery-full"></i></li>
          @endif
          @if($shop->credit === 0)
            <li><i class="far fa-credit-card"></i></li>
          @else
            <li class="opacity"><i class="far fa-credit-card"></i></li>
          @endif
          @if($shop->smoke === 1)
            <li><i class="fas fa-smoking-ban"></i></li>
          @else
            <li class="opacity"><i class="fas fa-smoking-ban"></i></li>
          @endif
          @if($shop->pet === 0)
            <li><i class="fas fa-dog"></i></li>
          @else
            <li class="opacity"><i class="fas fa-dog"></i></li>
          @endif
          @if($shop->liquor === 0)
            <li><i class="fas fa-glass-martini-alt"></i></li>
          @else
            <li class="opacity"><i class="fas fa-glass-martini-alt"></i></li>
          @endif
        </ul>
        <ul class="detail">
        @if($shop->image === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="{{$shop->image}}"></li>
        @endif
          <li>【{{$shop->getAreaNameJpn()}}】</li>
          <li>{{$shop->name}}</li>
        </ul>
      </a>
    @endforeach
  </div>
</div>
@endsection
