@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('shops.create'))

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
          <th>カード払い&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="credit" value=0 @if(old('credit', $shop->credit) == 0) checked @endif>&nbsp;可能
            <input type="radio" name="credit" value=1 @if(old('credit', $shop->credit) == 1) checked @endif>&nbsp;不可
            @if($errors->has('credit'))
              <span class="error">{{$errors->first('credit')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>喫煙&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="smoke" value=0 @if(old('smoke', $shop->smoke) == 0) checked @endif>&nbsp;可能
            <input type="radio" name="smoke" value=1 @if(old('smoke', $shop->smoke) == 1) checked @endif>&nbsp;不可
            @if($errors->has('smoke'))
              <span class="error">{{$errors->first('smoke')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>ペット同伴&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="pet" value=0 @if(old('pet', $shop->pet) == 0) checked @endif>&nbsp;可能
            <input type="radio" name="pet" value=1 @if(old('pet', $shop->pet) == 1) checked @endif>&nbsp;不可
            @if($errors->has('pet'))
              <span class="error">{{$errors->first('pet')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>最寄駅からの距離&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="station" value=0 @if(old('station', $shop->station) == 0) checked @endif>&nbsp;近い
            <input type="radio" name="station" value=1 @if(old('station', $shop->station) == 1) checked @endif>&nbsp;近くない
            @if($errors->has('station'))
              <span class="error">{{$errors->first('station')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>お洒落空間度&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="fashionable" value=0 @if(old('fashionable', $shop->fashionable) == 0) checked @endif>&nbsp;お洒落
            <input type="radio" name="fashionable" value=1 @if(old('fashionable', $shop->fashionable) == 1) checked @endif>&nbsp;普通
            @if($errors->has('fashionable'))
              <span class="error">{{$errors->first('fashionable')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>コーヒーへのこだわり&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="coffee" value=0 @if(old('coffee', $shop->coffee) == 0) checked @endif>&nbsp;有
            <input type="radio" name="coffee" value=1 @if(old('coffee', $shop->coffee) == 1) checked @endif>&nbsp;無
            @if($errors->has('coffee'))
              <span class="error">{{$errors->first('coffee')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>穴場具合&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="spot" value=0 @if(old('spot', $shop->spot) == 0) checked @endif>&nbsp;穴場
            <input type="radio" name="spot" value=1 @if(old('spot', $shop->spot) == 1) checked @endif>&nbsp;非穴場
            @if($errors->has('spot'))
              <span class="error">{{$errors->first('spot')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>お酒の提供&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="liquor" value=0 @if(old('liquor', $shop->liquor) == 0) checked @endif>&nbsp;有
            <input type="radio" name="liquor" value=1 @if(old('liquor', $shop->liquor) == 1) checked @endif>&nbsp;無
            @if($errors->has('liquor'))
              <span class="error">{{$errors->first('liquor')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>ホテル（宿泊施設）の有無&nbsp;<span class="must">必須</span></th>
          <td>
            <input type="radio" name="hotel" value=0 @if(old('hotel', $shop->hotel) == 0) checked @endif>&nbsp;有
            <input type="radio" name="hotel" value=1 @if(old('hotel', $shop->hotel) == 1) checked @endif>&nbsp;無
            @if($errors->has('hotel'))
              <span class="error">{{$errors->first('hotel')}}</span>
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
          <th>品揃え&nbsp;<span class="must">必須</span></th>
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
          <th>定休日</th>
          <td>
            <input class="medium-width" type="text" name="close" value="{{old('close')}}" placeholder="例）月曜日、祝日">
            @if($errors->has('close'))
              <span class="error">{{$errors->first('close')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>
            <input class="medium-width" type="text" inputmode="numeric" pattern="\d*" name="tel" value="{{old('tel')}}" placeholder="例）0312345678">
            @if($errors->has('tel'))
              <span class="error">{{$errors->first('tel')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>店舗HP（URL）</th>
          <td>
            <input class="large-width" type="text" name="url" value="{{old('url')}}" placeholder="例）https://example.com">
            @if($errors->has('url'))
              <span class="error">{{$errors->first('url')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>店舗トップ画像</th>
          <td>
            <input type="file" name="image" value="{{old('image')}}">
            @if($errors->has('image'))
            <span id="error">{{$errors->first('image')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>備考</th>
          <td><textarea name="content" placeholder="例）開放的な空間で作業に長時間の向いています。">{{old('content')}}</textarea></td>
        </tr>
        <tr>
          <th>注意事項</th>
          <td><textarea name="caution" placeholder="例）席は2時間までの利用制限があります。">{{old('caution')}}</textarea></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="submit">
    <input type="submit" value="登録する" onclick="return confirm('登録してもよろしいですか？')">
  </div>
</form>
@endsection
