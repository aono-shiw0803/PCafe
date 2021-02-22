@extends('layouts.index')

@section('main')
<div class="shops-show-first">
  <div class="shops-show-title">
    <ul>
      <li>【{{$shop->getAreaNameJpn()}}】</li>
      <li>{{$shop->name}}</li>
      <li><i class="far fa-calendar-check"></i>&nbsp;{{$shop->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-history"></i>&nbsp;{{$shop->updated_at}}</li>
    </ul>
  </div>
  <div class="shops-show-image">
    @if($shop->image === null)
      <img src="/storage/no-icon.png">
    @else
      <img src="{{$shop->image}}">
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
  </div>
  <div class="shops-show-graph">
    <table>
      <tr>
        <th>騒音具合</th>
        <td>
          @if($shop->voice === 1)
            <p class="point"></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
          @elseif($shop->voice === 2)
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
            <p></p>
            <p></p>
          @elseif($shop->voice === 3)
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
            <p></p>
          @elseif($shop->voice === 4)
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
          @else
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
          @endif
        </td>
        <th>{{$shop->getVoice()}}</th>
      </tr>
      <tr>
        <th>客席数</th>
        <td>
          @if($shop->capacity === 1)
            <p class="point"></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
          @elseif($shop->capacity === 2)
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
            <p></p>
            <p></p>
          @elseif($shop->capacity === 3)
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
            <p></p>
          @elseif($shop->capacity === 4)
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
          @else
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
          @endif
        </td>
        <th>{{$shop->getCapacity()}}</th>
      </tr>
      <tr>
        <th>品揃え</th>
        <td>
          @if($shop->cuisine === 1)
            <p class="point"></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
          @elseif($shop->cuisine === 2)
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
            <p></p>
            <p></p>
          @elseif($shop->cuisine === 3)
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
            <p></p>
          @elseif($shop->cuisine === 4)
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p></p>
          @else
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
            <p class="point"></p>
          @endif
        </td>
        <th>{{$shop->getCuisine()}}</th>
      </tr>
    </table>
  </div>
  <div class="shops-show-hash">
    <ul>
      @if($shop->wifi === 0 && $shop->outlet === 0)
        <li>Wi-Fi・電源完備</li>
      @endif
      @if($shop->station === 0)
        <li>駅近</li>
      @endif
      @if($shop->fashionable === 0)
        <li>オシャレ空間</li>
      @endif
      @if($shop->coffee === 0)
        <li>こだわりのコーヒー</li>
      @endif
      @if($shop->spot === 0)
        <li>穴場カフェ</li>
      @endif
      @if($shop->liquor === 0)
        <li>お酒提供あり</li>
      @endif
      @if($shop->hotel === 0)
        <li>ホテルのカフェ</li>
      @endif
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
      <li>所在地：{{$shop->address}}</li>
      @if($shop->tel === null)
        <li>TEL：<span>-</span></li>
      @else
        <li>TEL：<a href="tel:{{$shop->tel}}">{{$shop->tel}}</a></li>
      @endif
      @if($shop->close === null)
        <li>定休日：<span>なし</span></li>
      @else
        <li>定休日：{{$shop->close}}</li>
      @endif
      @if($shop->url === null)
        <li>HP：<span>-</span></li>
      @else
        <li>HP：<a target="_blank" href="{{$shop->url}}">{{$shop->url}}</a></li>
      @endif
      <li>登録ユーザー：<a href="{{url('/users', $shop->user_id)}}">{{$shop->user->name}}</a></li>
      @if($shop->liked_by_user())
        <li>ユーザー評価：<a href="{{route('shops.unlike', ['id' => $shop->id])}}" onclick="return confirm('お気に入りを解除しますか？')"><i class="fas fa-heart liked"></i>{{$shop->likes->count()}}</a><span>※お気に入り登録済み</span></li>
      @else
        <li>ユーザー評価：<a href="{{route('shops.like', ['id' => $shop->id])}}" onclick="return confirm('お気に入りに登録しますか？')"><i class="fas fa-heart no-like"></i>{{$shop->likes->count()}}</a></li>
      @endif
    </ul>
  </div>
  @if($shop->caution != null)
    <div class="shops-show-caution">
      <p>{{$shop->caution}}</p>
    </div>
  @endif
  @if(Auth::User()->id === $shop->user_id)
    <div class="shops-show-btn">
      <ul>
        <li><a href="{{route('shops.edit', ['shop' => $shop->id])}}">編集</a></li>
        <li>
          <form method="post" action="/shops/delete/{{$shop->id}}">
            @csrf
            <input class="delete" type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </li>
        <li><a href="{{route('photos.create', ['shop' => $shop->id])}}">写真登録</a></li>
      </ul>
    </div>
  @endif
</div>
<div class="shops-show-second">
  @foreach($photos as $photo)
    @if($photo->shop_id === $shop->id)
    <a href="{{route('photos.show', ['photo' => $photo->id])}}">
      <img src="{{$photo->file}}" alt="{{$photo->name}}">
    </a>
    @endif
  @endforeach
</div>
@endsection
