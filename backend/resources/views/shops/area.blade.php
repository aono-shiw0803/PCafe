@extends('layouts.index')

@section('main')
<div class="shops-area-first">
  @forelse($shops as $shop)
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
      </ul>
    </a>
  @empty
    <p class="empty">カフェ情報がありません。</p>
  @endforelse
</div>
@endsection