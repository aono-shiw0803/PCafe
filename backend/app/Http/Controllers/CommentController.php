<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;
use App\Shop;
use App\Comment;

class CommentController extends Controller
{
    public function create(Comment $comment, Shop $shop){
      return view('comments.create', ['comment'=>$comment, 'shop'=>$shop]);
    }

    public function store(CommentsRequest $request, Comment $comment, Shop $shop){
      $comment = new Comment();
      $comment->title = $request->title;
      $comment->content = $request->content;
      $comment->user_id = $request->user_id;
      $comment->shop_id = $request->shop_id;
      $comment->face = $request->face;
      $comment->save();
      session()->flash('flash_message', '口コミの投稿をしました！');
      return redirect('shops/' . $shop->id);
    }

    public function delete(Request $request, Shop $shop){
      Comment::find($request->id)->delete();
      session()->flash('flash_message', '削除しました！');
      return redirect('shops/' . $shop->id);
    }
}
