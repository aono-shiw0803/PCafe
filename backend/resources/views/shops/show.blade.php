@extends('layouts.index')

@section('main')
<div class="shops-show-first">
  <div class="shops-show-title">
    <ul>
      <li>{{$shop->area}}</li>
      <li>{{$shop->name}}</li>
      <li><i class="far fa-calendar-check"></i>&nbsp;{{$shop->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-history"></i>&nbsp;{{$shop->updated_at}}</li>
    </ul>
  </div>
  <div class="shops-show-image">
    @if($shop->image === null)
      <img src="/storage/no-icon.png">
    @else
      <img src="/storage/{{$shop->image}}">
    @endif
  </div>
  <div class="shops-show-facility">
    <ul>
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
    </ul>
  </div>
  <div class="shops-show-graph">
    <ul>
      <!-- 「range」でメーターを表現する予定 -->
      <li><span>落ち着き空間度</span>{{$shop->voice}}</li>
      <li><span>客席数</span>{{$shop->capacity}}</li>
      <li><span>メニューの豊富さ</span>{{$shop->cuisine}}</li>
    </ul>
  </div>
  <div class="shops-show-content">
    @if($shop->content === null)
      <p class="center">ー</p>
    @else
      <p>{{$shop->content}}</p>
    @endif
  </div>
  <div class="shops-show-detail">
    <ul>
      <li>アクセス：{{$shop->address}}</li>
      <li>TEL：</li>
      <li>定休日：</li>
      <li>HP：<a href="#"></a></li>
      <li>登録ユーザー：<a href="http://localhost:8001/users/{{$shop->user_id}}">{{$shop->user->name}}</a></li>
    </ul>
  </div>
  @if(Auth::User()->id === $shop->user_id)
    <div class="shops-show-btn">
      <ul>
        <li><a href="http://localhost:8001/shops/{{$shop->id}}/edit">編集</a></li>
        <li>
          <form method="post" action="/shops/delete/{{$shop->id}}">
            @csrf
            <input class="delete" type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </li>
      </ul>
    </div>
  @endif
</div>
@endsection
