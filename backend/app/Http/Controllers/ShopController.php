<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\Photo;
use Carbon\Carbon;
use App\Http\Requests\ShopsRequest;
use Storage;

class ShopController extends Controller
{
    public function index(Request $request){
      $shops = Shop::orderBy('updated_at', 'desc')->get();
      return view('shops.index', ['shops'=>$shops, 'users'=>$request->users]);
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
