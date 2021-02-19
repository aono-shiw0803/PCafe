<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
      'user_id', 'shop_id',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function shop(){
      return $this->belongsTo('App\Shop');
    }

    // 「いいね」されているか確認するメソッド
    public function likeExist($id, $shop_id){
      $exist = Like::where('user_id', '=', $id)->where('shop_id', '=', $shop_id)->get();
      if(!$exist->isEmpty()){
        return true;
      } else {
        return false;
      }
    }
}
