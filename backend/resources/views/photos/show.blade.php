@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('photos.show', $photo))

@section('main')
<div class="photos-show-first">
  <div class="photos-show-title">
    <p>{{$photo->name}}</p>
  </div>
  <div class="photos-show-detail">
    <ul>
      <li><i class="far fa-calendar-check"></i>&nbsp;{{$photo->created_at->format('Y-m-d')}}</li>
      <li>該当のカフェ：<a href="{{route('shops.show', ['shop' => $photo->shop_id])}}">{{$photo->shop->name}}</a></li>
      <li>撮影ユーザー：<a href="{{route('users.show', ['user' => $photo->user_id])}}">{{$photo->user->name}}</a></li>
    </ul>
  </div>
  <div class="photos-show-image">
    <img src="{{$photo->file}}" alt="{{$photo->name}}">
  </div>
  @if($photo->content != null)
    <div class="photos-show-content">
      <p>{{$photo->content}}</p>
    </div>
  @endif
  <div class="submit">
    <ul>
      <li><button onclick="history.back()">戻る</button></li>
      @if(Auth::User()->id === $photo->user_id)
        <li>
          <form method="post" action="/photos/delete/{{$photo->id}}">
            @csrf
            <input class="delete" type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </li>
      @endif
    </ul>
  </div>
</div>
@endsection
