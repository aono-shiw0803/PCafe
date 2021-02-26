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
  <h2>ー最近の活動状況ー</h2>
  <a href="#">
    <img src="/storage/no-icon.png"></li>
    <ul>
      <li>【滞在日】2021/02/23[TUE]</li>
      <li>13:00〜18:00</li>
      <li>利用目的：読書</li>
    </ul>
  </a>
</div>
@endsection
