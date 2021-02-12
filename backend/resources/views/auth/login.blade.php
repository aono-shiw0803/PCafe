@extends('layouts.index')

@section('main')
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="name">ユーザー名</label>
    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
      <label for="password">パスワード</label>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="form-check-label" for="remember">入力事項を記録する</label>
      <button type="submit">ログイン</button>
    @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">パスワードを忘れた場合はこちら</a>
    @endif
  </form>
@endsection
