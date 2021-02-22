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
}
