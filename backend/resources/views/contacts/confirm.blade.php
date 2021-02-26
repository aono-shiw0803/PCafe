@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('contacts.confirm'))

@section('main')
<div class="contacts-confirm-first">
  <h2>ーお問い合わせ内容の確認ー</h2>
</div>

<form method="post" action="{{route('contacts.store')}}">
  @csrf
  <div class="contacts-confirm-second">
    <table>
      <tbody>
        <tr>
          <th>氏名</th>
          <td>{{$inputs['name']}}</td>
          <input type="hidden" name="name" value="{{$inputs['name']}}">
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>{{$inputs['email']}}</td>
          <input type="hidden" name="email" value="{{$inputs['email']}}">
        </tr>
        <tr>
          <th>お問い合わせ内容</th>
          <td>{{$inputs['type']}}</td>
          <input type="hidden" name="type" value="{{$inputs['type']}}">
        </tr>
        <tr>
          <th>お問い合わせ内容（詳細）</th>
          <td><p>{{$inputs['content']}}</p></td>
          <input type="hidden" name="content" value="{{$inputs['content']}}">
        </tr>
      </tbody>
    </table>
  </div>
  <div class="submit">
    <button name="action" type="submit" value="submit" onclick="return confirm('本当に送信してもよろしいですか？')">送信</button>
  </div>
</form>
@endsection
