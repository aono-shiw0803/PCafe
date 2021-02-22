<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\Photo;
use App\Like;
use Carbon\Carbon;
use App\Http\Requests\ShopsRequest;
use Storage;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request){
      $data = [];
      //withCount('テーブル名')とすることで、リレーションの数を取得（viewの{{$shop->likes_count}}に該当）
      $shops = Shop::withCount('likes')->orderBy('updated_at', 'desc')->get();
      $like_model = new Like;
      return view('shops.index', ['shops'=>$shops, 'like_model'=>$like_model, 'users'=>$request->users]);
    }

    public function agaxlike(Request $request){
      $id = Auth::User()->id;
      $shop_id = $request->shop_id;
      $like = new Like;
      $shop = Shop::findOrFail($shop_id);

      // 既に良いねしている場合
      if($like->likeExist($id, $shop_id)){
        // likesテーブルのレコードを削除
        $like = Like::where('shop_id', $shop_id)->where('user_id', $id)->delete();
      } else {
        // まだいいねをしていない場合はlikesテーブルに新しいレコードを作成する
        $like = new Like;
        $like->shop_id = $request->shop_id;
        $like->user_id = Auth::User()->id;
        $like->save();
      }

      //withCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
      $shopLikesCount = $shop->withCount('likes')->likes_count;
      //一つの変数にajaxに渡す値をまとめる（少ない場合はまとめる必要はないが一応）
      $json = [
          'shopLikesCount' => $shopLikesCount,
      ];
      //下記の記述で「ajaxlike.jsファイル」にパラメーター（いいねの総数）を返すことができる。
      return response()->json($json);
    }

    public function area($area){
      $shops = Shop::where('area', $area)->orderBy('updated_at', 'desc')->get();
      return view('shops.area', ['shops'=>$shops, 'area'=>$area]);
    }

    public function tema($tema){
      $shops = Shop::where($tema, 0)->orderBy('updated_at', 'desc')->get();
      return view('shops.tema', ['shops'=>$shops, 'tema'=>$tema]);
    }

    public function show(Shop $shop){
      $photos = Photo::all();
      return view('shops.show', ['shop'=>$shop, 'photos'=>$photos]);
    }

    public function create(Shop $shop){
      return view('shops.create', ['shop'=>$shop]);
    }

    public function store(ShopsRequest $request, Shop $shop){
      // Shop::create($request->validated());
      $shop = new Shop();
      $shop->name = $request->name;
      $shop->area = $request->area;
      $shop->address = $request->address;
      $shop->content = $request->content;
      $shop->wifi = $request->wifi;
      $shop->outlet = $request->outlet;
      $shop->credit = $request->credit;
      $shop->smoke = $request->smoke;
      $shop->pet = $request->pet;
      $shop->station = $request->station;
      $shop->fashionable = $request->fashionable;
      $shop->coffee = $request->coffee;
      $shop->spot = $request->spot;
      $shop->liquor = $request->liquor;
      $shop->hotel = $request->hotel;
      $shop->voice = $request->voice;
      $shop->capacity = $request->capacity;
      $shop->cuisine = $request->cuisine;
      $shop->start_time = $request->start_time;
      $shop->end_time = $request->end_time;
      $shop->tel = $request->tel;
      $shop->url = $request->url;
      $shop->close = $request->close;
      $shop->caution = $request->caution;
      $shop->user_id = $request->user_id;
      if($shop->image = $request->image){
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('pcafe/shops', $image, 'public');
        $shop->image = Storage::disk('s3')->url($path);
      }
      $shop->save();
      session()->flash('flash_message', '登録が完了しました！');
      return redirect('shops/' . $shop->id);
    }

    public function edit(Shop $shop){
      return view('shops.edit', ['shop'=>$shop]);
    }

    public function update(ShopsRequest $request, Shop $shop){
      // $shop->fill($request->validated())->save();
      $shop->name = $request->name;
      $shop->area = $request->area;
      $shop->address = $request->address;
      $shop->content = $request->content;
      $shop->wifi = $request->wifi;
      $shop->outlet = $request->outlet;
      $shop->credit = $request->credit;
      $shop->smoke = $request->smoke;
      $shop->pet = $request->pet;
      $shop->station = $request->station;
      $shop->fashionable = $request->fashionable;
      $shop->coffee = $request->coffee;
      $shop->spot = $request->spot;
      $shop->liquor = $request->liquor;
      $shop->hotel = $request->hotel;
      $shop->voice = $request->voice;
      $shop->capacity = $request->capacity;
      $shop->cuisine = $request->cuisine;
      $shop->start_time = $request->start_time;
      $shop->end_time = $request->end_time;
      $shop->tel = $request->tel;
      $shop->url = $request->url;
      $shop->close = $request->close;
      $shop->caution = $request->caution;
      $shop->user_id = $request->user_id;
      if($shop->image = $request->image){
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('pcafe/shops', $image, 'public');
        $shop->image = Storage::disk('s3')->url($path);
      }
      $shop->save();
      session()->flash('flash_message', '更新が完了しました！');
      return redirect('shops/' . $shop->id);
    }

    public function delete(Request $request){
      Shop::find($request->id)->delete();
      session()->flash('flash_message', '削除が完了しました！');
      return redirect('shops/');
    }
}
