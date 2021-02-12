@extends('layouts.index')

@section('main')
<div class="users-index-first">
  <h2>ユーザー一覧</h2>
</div>

<div class="users-index-second">
  @foreach($users as $user)
    <a class="users-detail" href="http://localhost:8001/users/{{$user->id}}">
      <ul>
        @if($user->icon === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="/storage/{{$user->image}}"></li>
        @endif
        <li class="center"><p>{{$user->name}}</p></li>
      </ul>
    </a>
  @endforeach
</div>
@endsection
