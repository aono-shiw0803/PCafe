@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('contacts.complete'))

@section('main')
<div class="contacts-complete-first">
  <h2>ー送信が完了しましたー</h2>
  <p>お問い合わせありがとうございました！<br>
  お問い合わせ内容の確認メールをお送りしましたのでご確認ください。</p>
</div>

<div class="contacts-complete-second">
  <ul>
    <li><a href="{{route('tops.index')}}">トップに戻る</a></li>
    <li><a href="{{route('contacts.create')}}">お問い合わせを続ける</a></li>
  </ul>
</div>
@endsection
