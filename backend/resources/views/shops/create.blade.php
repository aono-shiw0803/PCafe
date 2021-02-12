@extends('layouts.index')

@section('main')
<div class="shops-create-first">
  <h2>ーカフェ登録フォームー</h2>
  <p>下記の項目を入力してください。</p>
</div>

<form method="post" action="{{route('shops.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="shops-create-second">
    <table>
      <tbody>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <tr>
          <th>店名&nbsp;<span class="must">必須</span></th>
          <td>
            <input class="large-width" type="text" name="name" value="{{old('name')}}" placeholder="例）渋谷カフェ">
            @if($errors->has('name'))
              <span class="error">{{$errors->first('name')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>エリア&nbsp;<span class="must">必須</span></th>
          <td>
            <select name="area">
              <option disabled selected value>選択してください</option>
              @foreach(config('ShopData.areas') as $area)
                <option value="{{$area['url']}}" @if(old('area', $shop->area) == $area['url']) selected @endif>{{$area['name']}}</option>
              @endforeach
            </select>
            @if($errors->has('area'))
              <span class="error">{{$errors->first('area')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>所在地&nbsp;<span class="must">必須</span></th>
          <td>
            <input class="large-width" type="text" name="address" value="{{old('address')}}" placeholder="例）東京都渋谷区神宮前2-23-7">
            @if($errors->has('address'))
              <span class="error">{{$errors->first('address')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>Wi-Fi&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="wifi" value=0 @if(old('wifi', $shop->wifi) == 0) checked @endif>&nbsp;有
            <input type="radio" name="wifi" value=1 @if(old('wifi', $shop->wifi) == 1) checked @endif>&nbsp;無
            @if($errors->has('wifi'))
              <span class="error">{{$errors->first('wifi')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>電源&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="outlet" value=0 @if(old('outlet', $shop->outlet) == 0) checked @endif>&nbsp;有
            <input type="radio" name="outlet" value=1 @if(old('outlet', $shop->outlet) == 1) checked @endif>&nbsp;無
            @if($errors->has('outlet'))
              <span class="error">{{$errors->first('outlet')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>静寂度&nbsp;<span class="must">必須</span></th>
          <td>
            <select name="voice">
              <option disabled selected value>選択してください</option>
              <option value=1 @if(old('voice', $shop->voice) == 1) selected @endif>非常に騒音</option>
              <option value=2 @if(old('voice', $shop->voice) == 2) selected @endif>やや騒音</option>
              <option value=3 @if(old('voice', $shop->voice) == 3) selected @endif>普通</option>
              <option value=4 @if(old('voice', $shop->voice) == 4) selected @endif>やや静寂</option>
              <option value=5 @if(old('voice', $shop->voice) == 5) selected @endif>非常に静寂</option>
            </select>
            @if($errors->has('voice'))
              <span class="error">{{$errors->first('voice')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>座席数&nbsp;<span class="must">必須</span></th>
          <td>
            <select name="capacity">
              <option disabled selected value>選択してください</option>
              <option value=1 @if(old('capacity', $shop->capacity) == 1) selected @endif>非常に少ない</option>
              <option value=2 @if(old('capacity', $shop->capacity) == 2) selected @endif>やや少ない</option>
              <option value=3 @if(old('capacity', $shop->capacity) == 3) selected @endif>普通</option>
              <option value=4 @if(old('capacity', $shop->capacity) == 4) selected @endif>やや多い</option>
              <option value=5 @if(old('capacity', $shop->capacity) == 5) selected @endif>非常に多い</option>
            </select>
            @if($errors->has('capacity'))
              <span class="error">{{$errors->first('capacity')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>料理品数&nbsp;<span class="must">必須</span></th>
          <td>
            <select name="cuisine">
              <option disabled selected value>選択してください</option>
              <option value=1 @if(old('cuisine', $shop->cuisine) == 1) selected @endif>非常に少ない</option>
              <option value=2 @if(old('cuisine', $shop->cuisine) == 2) selected @endif>やや少ない</option>
              <option value=3 @if(old('cuisine', $shop->cuisine) == 3) selected @endif>普通</option>
              <option value=4 @if(old('cuisine', $shop->cuisine) == 4) selected @endif>やや豊富</option>
              <option value=5 @if(old('cuisine', $shop->cuisine) == 5) selected @endif>非常に豊富</option>
            </select>
            @if($errors->has('cuisine'))
              <span class="error">{{$errors->first('cuisine')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>OPEN&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="time" name="start_time" value="{{old('start_time')}}">
            @if($errors->has('start_time'))
              <span class="error">{{$errors->first('start_time')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>CLOSE&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="time" name="end_time" value="{{old('end_time')}}">
            @if($errors->has('end_time'))
              <span class="error">{{$errors->first('end_time')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>地図</th>
          <td>
            <input class="large-width" type="text" name="map" value="{{old('map')}}"><br>
            <p class="font-size-small">※Googleマップからの地図URLの取得方法は<a class="underline" target="_blank" href="https://www.360vr.co.jp/blog/shuukyaku/mybusiness/googlemap_umekomi">こちら</a>を参考にしてください。</p>
          </td>
        </tr>
        <tr>
          <th>店舗トップ画像</th>
          <td>
            <input type="file" name="image" value="{{old('image')}}">
            @if($errors->has('image'))
            <span id="error">{{$errors->first('image')}}</span>
            @endif
            @isset($filename)
            <img src="{{asset('storage/public' . $shop->image)}}">
            @endisset
          </td>
        </tr>
        <tr>
          <th>備考</th>
          <td><textarea class="large-width" name="content" placeholder="例）電源席は2Fのみ。">{{old('content')}}</textarea></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="submit">
    <input type="submit" value="登録内容を確認する">
  </div>
</form>
@endsection
