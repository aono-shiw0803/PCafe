@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('users.show', $user))

@section('main')
<div class="users-show-first">
  @if($user->icon === null)
    <img src="/storage/no-icon.png">
  @else
    <img src="{{$user->icon}}">
  @endif
  <ul>
    <li>ユーザー名：{{$user->name}}</li>
    <li>年齢：{{$user->age}}歳</li>
    <li>性別：
      @if($user->gender === 0)
        女性
      @elseif($user->gender === 1)
        男性
      @else
        その他
      @endif
    </li>
    <li>活動拠点：{{$user->from}}</li>
    <li>{{$user->created_at->format('Y-m-d')}}&nbsp;から利用しています</li>
  </ul>
</div>
@if($user->content === null)
  <div class="users-show-second-empty">
    <p>ー</p>
  </div>
@else
  <div class="users-show-second">
    <p>{{$user->content}}</p>
  </div>
@endif
@if(Auth::User()->id === $user->id)
  <div class="submit">
    <ul>
      <li><a href="http://localhost:8001/users/{{Auth::User()->id}}/edit">編集</a></li>
      <li>
        <form method="post" action="/users/delete/{{$user->id}}">
          @csrf
          <input class="delete" type="submit" value="退会" onclick="return confirm('本当に退会してもよろしいですか？（データの復元はできません）')">
        </form>
      </li>
    </ul>
  </div>
@endif
<div class="users-show-third">
  <h2>ー登録されているスケジュールー</h2>
    @forelse($posts as $post)
      @if($now > $post->day)
      <a class="users-detail opacity" href="{{route('posts.show', ['shop'=>$post->shop_id, 'post'=>$post->id])}}">
      @else
      <a class="users-detail" href="{{route('posts.show', ['shop'=>$post->shop_id, 'post'=>$post->id])}}">
      @endif
        @if($post->image == null)
          <img src="/storage/no-icon.png">
        @else
          <img src="{{$post->image}}">
        @endif
        <ul>
          @if($now > $post->day)
            <li>【終了】&nbsp;&nbsp;{{$post->day->format('m/d')}}&nbsp;&nbsp;&nbsp;&nbsp;{{$post->start_time->format('H:i')}}〜{{$post->end_time->format('H:i')}}</li>
          @else
            <li>{{$post->day->format('m/d')}}&nbsp;&nbsp;&nbsp;&nbsp;{{$post->start_time->format('H:i')}}〜{{$post->end_time->format('H:i')}}</li>
          @endif
          <li>{{$post->title}}</li>
          <li>利用カフェ：{{$post->shop->name}}</li>
          <li>登録ユーザー：{{$post->user->name}}&nbsp;&nbsp;&nbsp;&nbsp;登録日：{{$post->created_at->format('Y-m-d')}}</li>
        </ul>
      </a>
    @empty
      <p class="empty">予定されているスケジュールはありません。</p>
    @endforelse
</div>
@endsection
