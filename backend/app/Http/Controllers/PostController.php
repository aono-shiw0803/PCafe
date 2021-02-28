<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use App\Shop;
use Carbon\Carbon;
use Storage;

class PostController extends Controller
{
    public function index(Shop $shop, Post $post){
      $posts = Post::orderBy('day', 'desc')->get();
      return view('posts.index', ['posts'=>$posts, 'shop'=>$shop, 'post'=>$post, 'now'=>$now]);
    }

    public function show(Shop $shop, Post $post, User $user){
      return view('posts.show', ['shop'=>$shop, 'post'=>$post, 'user'=>$user]);
    }

    public function create(Post $post, Shop $shop){
      return view('posts.create', ['post'=>$post, 'shop'=>$shop]);
    }

    public function store(PostRequest $request, Shop $shop, Post $post){
      $post = new Post();
      $post->title = $request->title;
      $post->content = $request->content;
      $post->day = $request->day;
      $post->start_time = $request->start_time;
      $post->end_time = $request->end_time;
      $post->user_id = $request->user_id;
      $post->shop_id = $request->shop_id;
      if($post->image = $request->image){
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('pcafe/posts', $image, 'public');
        $post->image = Storage::disk('s3')->url($path);
      }
      $post->save();
      session()->flash('flash_message', '登録が完了しました！');
      return redirect(route('posts.show', ['shop' => $shop->id, 'post' => $post->id]));
    }

    public function edit(Shop $shop, Post $post){
      return view('posts.edit', ['shop'=>$shop, 'post'=>$post]);
    }

    public function update(PostRequest $request, Shop $shop, Post $post){
      $post->title = $request->title;
      $post->content = $request->content;
      $post->day = $request->day;
      $post->start_time = $request->start_time;
      $post->end_time = $request->end_time;
      $post->user_id = $request->user_id;
      $post->shop_id = $request->shop_id;
      if($post->image = $request->image){
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('pcafe/posts', $image, 'public');
        $post->image = Storage::disk('s3')->url($path);
      }
      $post->save();
      session()->flash('flash_message', '更新が完了しました！');
      return redirect(route('posts.show', ['shop'=>$shop->id, 'post'=>$post->id]));
    }

    public function delete(Request $request){
      Post::find($request->id)->delete();
      session()->flash('flash_message', '削除しました！');
      return redirect('/posts');
    }
}
