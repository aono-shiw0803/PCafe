<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title', 'content', 'day', 'start_time', 'end_time', 'user_id', 'shop_id', 'image',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function shop(){
      return $this->belongsTo('App\Shop');
    }
}
