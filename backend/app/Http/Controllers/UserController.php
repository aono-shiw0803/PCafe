<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Shop;
use App\Like;
use Carbon\Carbon;
use Storage;

class UserController extends Controller
{
    public function index(){
      $users = User::orderBy('updated_at', 'desc')->get();
      return view('users.index', ['users'=>$users]);
    }

    // お気に入りに登録したカフェ一覧
    public function favorite(User $user){
      $shops = Shop::whereHas('likes', function($query) use($user){
        $query->where('user_id', $user->id);
      })->get();
      return view('users.favorite', ['shops'=>$shops]);
    }

    public function show(User $user){
      return view('users.show', ['user'=>$user]);
    }

    public function edit(User $user){
      $user = User::find($user->id);
      return view('users.edit', ['user'=>$user]);
    }

    public function update(UsersRequest $request, User $user){
      // $user->fill($request->validated())->save();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->age = $request->age;
      $user->gender = $request->gender;
      $user->from = $request->from;
      $user->content = $request->content;
      if($user->icon = $request->icon){
        $icon = $request->file('icon');
        $path = Storage::disk('s3')->putFile('pcafe/users', $icon, 'public');
        $user->icon = Storage::disk('s3')->url($path);
      }
      $user->save();
      session()->flash('flash_message', '更新が完了しました！');
      return redirect('users/' . $user->id);
    }

    public function delete(Request $request){
      User::find($request->id)->delete();
      session()->flash('flash_message', 'Thank you for using 「PCafe」！');
      return redirect('/');
    }
}
