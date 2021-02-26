@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('comments.create', $shop))

@section('main')
<div class="comments-create-first">
  <h2>ー口コミ投稿フォームー</h2>
  <p>下記の項目を入力してください。</p>
  <span>投稿対象のカフェ：<a href="{{route('shops.show', ['shop' => $shop->id])}}">{{$shop->name}}</a></span>
</div>

<form method="post" action="{{route('comments.store', ['shop' => $shop->id])}}">
  @csrf
  <div class="comments-create-second">
    <table>
      <tbody>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <tr>
          <th>タイトル&nbsp;<span class="must">必須（30文字以内）</span></th>
          <td>
            <input type="text" name="title" value="{{old('title')}}" placeholder="例）とにかくお洒落！" autofocus>
            @if($errors->has('title'))
              <br><span class="error">{{$errors->first('title')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>コメント&nbsp;<span class="must">必須（200文字以内）</span></th>
          <td>
            <textarea name="content" placeholder="例）コンクリート打ちっぱなしのお洒落な空間なため、何時間でもいられます！">{{old('content')}}</textarea>
            @if($errors->has('content'))
              <br><span class="error">{{$errors->first('content')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>ポジティブ&nbsp;or&nbsp;ネガティブ&nbsp;<span class="must">必須</span></th>
          <td>
            <select name="face">
              <option value="0" @if(old('face', $comment->face) == 0) selected @endif>ポジティブ口コミ</option>
              <option value="1" @if(old('face', $comment->face) == 1) selected @endif>ネガティブ口コミ</option>
            </select>
            @if($errors->has('face'))
              <br><span class="error">{{$errors->first('face')}}</span>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="submit">
    <input type="submit" value="投稿する" onclick="return confirm('投稿してもよろしいですか？')">
  </div>
</form>
@endsection
