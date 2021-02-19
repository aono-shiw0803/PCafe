@extends('layouts.index')

@section('main')
  <form method="post" action="{{ route('register') }}">
    @csrf
    <label for="name">ユーザー名</label>
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
    <label for="age">年齢</label>
    <input id="age" type="text" inputmode="numeric" pattern="\d*" class="form-control @error('age') is-invalid @enderror" name="age" required autocomplete="new-age">
    @error('age')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="gender">性別</label>
    <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="new-gender" value=0>男性
    <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="new-gender" value=1>女性
    @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="from">居住地</label>
    <select id="from" type="text" class="form-control @error('from') is-invalid @enderror" name="from" required autocomplete="new-from">
      <option disabled selected value>選択してください</option>
      @foreach(config('FromData.froms') as $from)
        <option value="{{$from}}">{{$from}}</option>
      @endforeach
    </select>
    @error('from')
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
