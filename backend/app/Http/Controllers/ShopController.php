<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\ShopsRequest;

class ShopController extends Controller
{
    public function index(Request $request){
      $shops = Shop::all();
      return view('shops.index', ['shops'=>$shops, 'users'=>$request->users]);
    }

    public function show(Shop $shop){
      $shop = Shop::find($shop->id);
      return view('shops.show', ['shop'=>$shop]);
    }

    public function create(Shop $shop){
      return view('shops.create', ['shop'=>$shop]);
    }

    public function store(ShopsRequest $request, Shop $shop){
      Shop::create($request->validated());
      if($shop->image = $request->image){
        $path = $request->file('icon')->store('public');
        $shop->icon = basename($path);
      }
      session()->flash('flash_message', '登録が完了しました！');
      return redirect('shops/' . $shop->id);
    }

    public function edit(Shop $shop){
      return view('shops.edit', ['shop'=>$shop]);
    }

    public function update(ShopRequest $request, Shop $shop){
      $shop->fill($request->validated())->save();
      session()->flash('flash_message', '更新が完了しました！');
      return redirect('shops/' . $shop->id);
    }
    
    public function delete(Request $request){
      Shop::find($request->id)->delete();
      session()->flash('flash_message', '削除が完了しました！');
      return redirect('shops/');
    }
}
