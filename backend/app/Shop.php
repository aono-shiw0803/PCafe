<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
      'name', 'area', 'address', 'image', 'content', 'wifi', 'outlet', 'voice', 'capacity', 'cuisine', 'user_id', 'start_time', 'end_time', 'map',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
