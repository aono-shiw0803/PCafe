@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('posts.create', $shop))

@section('main')
<div class="posts-create-first">
  <h2>ースケジュール登録フォームー</h2>
</div>

<div class="posts-create-second">
  <p>ー利用予定のカフェー</p>
  <a href="{{route('shops.show', ['shop' => $shop->id])}}">{{$shop->name}}</a><br>
  <img src="{{$shop->image}}">
</div>

<form method="post" action="{{route('posts.store', ['shop' => $shop->id])}}" enctype="multipart/form-data">
  @csrf
  <div class="posts-create-third">
    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
    <input type="hidden" name="shop_id" value="{{$shop->id}}">
    <ul>
      <li>利用目的（タイトル）<span class="must">必須（40文字以内）</span></li>
      <li>
        <input class="half-width" type="text" name="title" value="{{old('title')}}" placeholder="例）ブログ記事執筆">
        @if($errors->has('title'))
          <span class="error">{{$errors->first('title')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>利用目的（詳細）<span class="must">必須（400文字以内）</span></li>
      <li>
        <textarea name="content" placeholder="例）自分が運営しているメディアの記事を書きます。">{{old('content')}}</textarea>
        @if($errors->has('content'))
          <span class="error">{{$errors->first('content')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>カフェ利用予定日<span class="must">必須</span></li>
      <li>
        <input type="date" name="day" value="{{old('day')}}">
        @if($errors->has('day'))
          <span class="error">{{$errors->first('day')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>利用開始時間<span class="must">必須</span></li>
      <li>
        <input type="time" name="start_time" value="{{old('start_time')}}">
        @if($errors->has('start_time'))
          <span class="error">{{$errors->first('start_time')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>利用終了時間<span class="must">必須</span></li>
      <li>
        <input type="time" name="end_time" value="{{old('end_time')}}">
        @if($errors->has('end_time'))
          <span class="error">{{$errors->first('end_time')}}</span>
        @endif
      </li>
    </ul>
    <ul>
      <li>イメージ画像</li>
      <li>
        <input class="no-width" type="file" name="image" value="{{old('image')}}">
        @if($errors->has('image'))
          <span class="error">{{$errors->first('image')}}</span>
        @endif
      </li>
    </ul>
  </div>
  <div class="submit">
    <input type="submit" value="登録する" onclick="return confirm('登録してもよろしいですか？')">
  </div>
</form>
@endsection
