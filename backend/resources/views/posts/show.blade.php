@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('posts.show', $shop, $post))

@section('main')
<div class="posts-show-first">
  <h2>ースケジュール詳細ー</h2>
</div>
<div class="posts-show-second">
  <div class="posts-show-detail">
    <div class="posts-show-detail-top">
      <ul>
        @if($now > $post->day)
          <li>【終了】&nbsp;{{$post->day->format('Y/m/d')}}</li>
        @else
          <li>{{$post->day->format('Y/m/d')}}</li>
        @endif
        <li><h3>{{$post->title}}</h3></li>
        <li>時間帯&nbsp;&nbsp;&nbsp;{{$post->start_time->format('H:i')}}〜{{$post->end_time->format('H:i')}}</li>
      </ul>
      @if($post->image == null)
        <img src="/storage/no-icon.png">
      @else
        <img src="{{$post->image}}">
      @endif
    </div>
    <ul>
      <li><p>{{$post->content}}</p></li>
      <li>利用予定カフェ：<a href="{{route('shops.show', ['shop' => $shop->id])}}">{{$post->shop->name}}</a></li>
      <li>登録ユーザー：<a href="{{route('users.show', ['user' => $post->user_id])}}">{{$post->user->name}}</a></li>
      <li>スケジュール登録日：{{$post->created_at->format('Y-m-d')}}&nbsp;&nbsp;&nbsp;&nbsp;スケジュール更新日：{{$post->updated_at->format('Y-m-d')}}</li>
    </ul>
  </div>
  @if($post->user_id === Auth::User()->id)
    <ul class="submit">
      <li><a href="{{route('posts.edit', ['shop' => $shop->id, 'post' => $post->id])}}">編集</a></li>
      <li>
        <form method="post" action="{{route('posts.delete', ['shop' => $shop->id, 'post' => $post->id, 'id' => $post->id])}}">
          @csrf
          <input class="delete" type="submit" value="削除" onclick="return confirm('本当に削除してもよろしいですか？')">
        </form>
      </li>
    </ul>
  @endif
</div>
@endsection
