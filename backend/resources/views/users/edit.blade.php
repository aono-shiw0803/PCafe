@extends('layouts.index')

@section('main')
<div class="users-edit-first">
  <h2>ーユーザー情報編集フォームー</h2>
  <p>下記の項目を入力してください。</p>
</div>

<form method="POST" action="{{url('/users', $user->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="users-edit-second">
    <ul>
      <li>ユーザー名&nbsp;<span class="must">必須</span></li>
      <li>
        <input type="text" class="medium-width" name="name" value="{{old('name', $user->name)}}" autofocus>
        @if($errors->has('name'))
          <span class="error">{{$errors->first('name')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>メールアドレス&nbsp;<span class="must">必須</span></li>
      <li>
        <input type="email" class="half-width" name="email" value="{{old('email', $user->email)}}">
        @if($errors->has('email'))
          <span class="error">{{$errors->first('email')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>年齢&nbsp;<span class="must">必須</span></li>
      <li>
        <input type="text" inputmode="numeric" pattern="\d*" class="small-width" name="age" value="{{old('age', $user->age)}}">
        @if($errors->has('age'))
          <span class="error">{{$errors->first('age')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>性別&nbsp;<span class="must">必須</span></li>
      <li>
        <input type="radio" name="gender" value="0" @if(old('gender', $user->gender) == 0) checked @endif>女性
        <input type="radio" name="gender" value="1" @if(old('gender', $user->gender) == 1) checked @endif>男性
        <input type="radio" name="gender" value="2" @if(old('gender', $user->gender) == 2) checked @endif>その他
        @if($errors->has('gender'))
          <span class="error">{{$errors->first('gender')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>活動拠点&nbsp;<span class="must">必須</span></li>
      <li>
        <select type="text" name="from">
          @foreach(config('FromData.froms') as $from)
            <option value="{{$from}}" @if(old('from', $from) == $user->from) selected @endif>{{$from}}</option>
          @endforeach
        </select>
        @if($errors->has('from'))
          <span class="error">{{$errors->first('from')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>自己紹介</li>
      <li><textarea class="large-width" name="content">{{old('content', $user->content)}}</textarea></li>
    </ul>
    <ul>
      <li>アイコン</li>
      <li><input type="file" name="icon" value="{{old('icon', $user->icon)}}"></li>
    </ul>
  </div>
  <div class="submit">
    <button type="submit" onclick="return confirm('更新してもよろしいですか？')">更新</button>
  </div>
</form>
@endsection
