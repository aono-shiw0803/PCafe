@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('shops.updatedAt'))

@section('main')
<div class="shops-index-first">
  <h2>1カ月以内に更新されたカフェ</h2>
</div>
<div class="shops-index-second">
  @foreach($shops as $shop)
    <a class="shops-detail" href="{{route('shops.show', ['shop' => $shop->id])}}">
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
        <li class="center">【{{$shop->getAreaNameJpn()}}】</li>
        <li class="center">{{$shop->name}}</li>
        @if($shop->liked_by_user())
          <li class="center"><p><i class="fas fa-heart liked"></i><span>{{$shop->likes->count()}}&nbsp;&nbsp;&nbsp;&nbsp;口コミ：{{$shop->comments->count()}}件</span></p></li>
        @else
          <li class="center"><p><i class="fas fa-heart no-like"></i><span>{{$shop->likes->count()}}&nbsp;&nbsp;&nbsp;&nbsp;口コミ：{{$shop->comments->count()}}件</span></p></li>
        @endif
      </ul>
    </a>
  @endforeach
</div>
@endsection
