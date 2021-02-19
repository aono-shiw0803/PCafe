@extends('layouts.index')

@section('main')
<div class="contacts-create-first">
  <h2>ーお問い合わせフォームー</h2>
  <p>下記の項目を入力してください。</p>
</div>

<form method="post" action="{{route('contacts.confirm')}}">
  @csrf
  <div class="contacts-create-second">
    <table>
      <tbody>
        <tr>
          <th>氏名&nbsp;<span class="must">必須</span></th>
          <td>
            <input class="large-width" type="text" name="name" value="{{old('name')}}">
            @if($errors->has('name'))
              <br><span class="error">{{$errors->first('name')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>メールアドレス&nbsp;<span class="must">必須</span></th>
          <td>
            <input class="large-width" type="text" name="email" value="{{old('email')}}">
            @if($errors->has('email'))
              <br><span class="error">{{$errors->first('email')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>お問い合わせ内容&nbsp;<span class="must">必須</span></th>
          <td>
            <select name="type">
              <option disabled selected value>選択してください</option>
              <option value='サービスの使い方' @if(old('type', $contact->type) == 'サービスの使い方') selected @endif>サービスの使い方</option>
              <option value='サービストラブル' @if(old('type', $contact->type) == 'サービストラブル') selected @endif>サービストラブル</option>
              <option value='サービスの提案' @if(old('type', $contact->type) == 'サービスの提案') selected @endif>サービスの提案</option>
              <option value='営業・タイアップ関連' @if(old('type', $contact->type) == '営業・タイアップ関連') selected @endif>営業・タイアップ関連</option>
              <option value='その他' @if(old('type', $contact->type) == 'その他') selected @endif>その他</option>
            </select>
            @if($errors->has('type'))
              <br><span class="error">{{$errors->first('type')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>お問い合わせ内容（詳細）&nbsp;<span class="must">必須</span></th>
          <td>
            <textarea name="content">{{old('content')}}</textarea>
            @if($errors->has('content'))
              <br><span class="error">{{$errors->first('content')}}</span>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="submit">
    <input type="submit" value="確認画面へ">
  </div>
</form>
@endsection
