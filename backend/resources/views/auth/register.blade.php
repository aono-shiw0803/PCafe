@extends('layouts.index')

@section('main')
<div class="register-first">
  <h2>ー新規登録ー</h2>
</div>

<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="register-second">
    <ul>
      <li>ユーザー名</li>
      <li>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror medium-width" name="name" value="{{ old('name') }}" placeholder="Username" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </li>
    </ul>
    <ul>
      <li>メールアドレス</li>
      <li>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror half-width" name="email" placeholder="E-Mail" required autocomplete="new-email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </li>
    </ul>
    <ul>
      <li>年齢</li>
      <li>
        <input id="age" type="text" inputmode="numeric" pattern="\d*" class="form-control @error('age') is-invalid @enderror small-width" name="age" placeholder="Age" required autocomplete="new-age">
        @error('age')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </li>
    </ul>
    <ul>
      <li>性別</li>
      <li>
        <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="new-gender" value=0>女性
        <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="new-gender" value=1>男性
        <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="new-gender" value=2>その他
        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </li>
    </ul>
    <ul>
      <li>活動拠点</li>
      <li>
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
      </li>
    </ul>
    <ul>
      <li>パスワード</li>
      <li>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror medium-width" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </li>
    </ul>
    <ul>
      <li>パスワード（確認）</li>
      <li>
        <input id="password-confirm" type="password" class="form-control medium-widths" name="password_confirmation" required autocomplete="new-password">
      </li>
    </ul>
  </div>
  <div class="submit">
    <button type="submit" onclick="return confirm('登録してもよろしいですか？')">新規登録</button>
  </div>
</form>
@endsection
