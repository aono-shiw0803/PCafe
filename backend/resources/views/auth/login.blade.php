@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('login'))

@section('main')
<div class="login-first">
  <h2>ーログインフォームー</h2>
</div>

<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="login-second">
    <table>
      <tbody>
        <tr>
          <td>
            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username" required autocomplete="name" autofocus><br>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </td>
        </tr>
        <tr>
          <td>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password"><br>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="login-third">
    <ul>
      <li><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></li>
      <li for="remember">入力事項を記録する</li>
    </ul>
  </div>
  <div class="submit">
    <button type="submit">ログイン</button>
  </div>
  <div class="login-fourth">
    @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">パスワードを忘れた場合はこちら</a>
    @endif
  </div>
</form>
@endsection
