@extends('layouts.index')

@section('main')
  <form method="post" action="{{ route('register') }}">
    @csrf
    <label for="name">名前</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="email">メールアドレス</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="new-email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="password">パスワード</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認）</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    <button type="submit" class="btn btn-primary">新規登録する</button>
  </form>
@endsection
