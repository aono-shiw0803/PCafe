@extends('layouts.index')

@section('main')
<div class="photos-create-first">
  <h2>ーカフェフォト登録フォームー</h2>
  <p>下記の項目を入力してください。</p>
</div>

<form method="post" action="{{route('photos.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="photos-create-second">
    <table>
      <tbody>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <tr>
          <th>写真&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="file" name="file" value="{{old('file')}}">
            @if($errors->has('file'))
            <span id="error">{{$errors->first('file')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>タイトル</th>
          <td>
            <input class="large-width" type="text" name="name" value="{{old('name')}}" placeholder="例）渋谷カフェの内装">
            @if($errors->has('name'))
              <span class="error">{{$errors->first('name')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>備考</th>
          <td><textarea name="content">{{old('content')}}</textarea></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="submit">
    <input type="submit" value="登録する" onclick="return confirm('登録してもよろしいですか？')">
  </div>
</form>
@endsection
