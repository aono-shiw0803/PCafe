<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use App\User;
use App\Photo;
use App\Post;
use App\Like;
use App\Comment;
use Carbon\Carbon;
use App\Http\Requests\ShopsRequest;
use Storage;

class ShopController extends Controller
{
    public function like($id){
      Like::create([
        'shop_id' => $id,
        'user_id' => Auth::User()->id,
      ]);
      return redirect()->back();
    }

    public function unlike($id){
      $like = Like::where('shop_id', $id)->where('user_id', Auth::User()->id)->first();
      $like->delete();
      return redirect()->back();
    }

    public function index(Request $request){
      $shops = Shop::orderBy('updated_at', 'desc')->get();
      return view('shops.index', ['shops'=>$shops, 'users'=>$request->users]);
    }

    public function ranking(){
      $shops = Shop::withCount('likes')->orderBy('likes_count', 'desc')->paginate(9);
      return view('shops.ranking', ['shops'=>$shops]);
    }

    // 直近30日以内に登録されたカフェのみ表示（ロジックはViewComposerに記述）
    public function createdAt(){
      return view('shops.created_at');
    }
    // 直近30日以内に更新されたカフェのみ表示（ロジックはViewComposerに記述）
    public function updatedAt(){
      return view('shops.updated_at');
    }

    // エリア別で探す
    public function area($area){
      $shops = Shop::where('area', $area)->orderBy('updated_at', 'desc')->get();
      return view('shops.area', ['shops'=>$shops, 'area'=>$area]);
    }

    // テーマ別で探す
    public function tema($tema){
      $shops = Shop::where($tema, 0)->orderBy('updated_at', 'desc')->get();
      return view('shops.tema', ['shops'=>$shops, 'tema'=>$tema]);
    }

    public function show(Shop $shop){
      $photos = Photo::all();
      $comments = Comment::where('shop_id', $shop->id)->orderBy('created_at', 'desc')->paginate(10);
      $posts = Post::where('shop_id', $shop->id)->get();
      return view('shops.show', ['shop'=>$shop, 'photos'=>$photos, 'comments'=>$comments, 'posts'=>$posts]);
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
