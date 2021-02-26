@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('main')
<div class="users-index-first">
  <h2>ユーザー一覧</h2>
</div>

<div class="users-index-second">
  @foreach($users as $user)
    <a class="users-detail" href="{{route('users.show', ['user' => $user->id])}}">
      <ul>
        @if($user->icon === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="{{$user->icon}}"></li>
        @endif
        <li class="center">{{$user->name}}</li>
        <li class="center">活動拠点：{{$user->from}}</li>
      </ul>
    </a>
  @endforeach
</div>
@endsection
