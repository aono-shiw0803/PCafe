<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    protected $fillable = [
      'name',
      'area',
      'address',
      'image',
      'content',
      'wifi',
      'outlet',
      'credit',
      'smoke',
      'pet',
      'station',
      'fashionable',
      'coffee',
      'spot',
      'liquor',
      'hotel',
      'voice',
      'capacity',
      'cuisine',
      'user_id',
      'start_time',
      'end_time',
      'tel',
      'url',
      'close',
      'caution',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function photos(){
      return $this->hasMany('App\Photo');
    }

    public function likes(){
      return $this->hasMany('App\Like');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function getAreaNameJpn(){
      return [
        'shibuya' => '渋谷',
        'harajuku_omotesando' => '原宿・表参道',
        'daikanyama_nakameguro' => '代官山・中目黒',
        'ebisu_hiroo' => '恵比寿・広尾',
        'shinjuku_yoyogi' => '新宿・代々木',
        'takadanobaba_waseda_kagurazaka' => '高田馬場・早稲田・神楽坂',
        'idabashi_suidoubashi_jinbocho' => '飯田橋・水道橋・神保町',
        'marunouchi_otemachi' => '丸の内・大手町',
        'ginza_yaesu_nihonbashi' => '銀座・八重洲・日本橋',
        'meguro_shirokanedai' => '目黒・白金台',
        'aoyama_akasaka' => '青山・赤坂',
        'roppongi_azabujuban_nishiazabu' => '六本木・麻布十番・西麻布',
        'toranomon_hibiya' => '虎ノ門・日比谷',
        'shinagawa_takanawa_tennozu' => '品川・高輪・天王洲',
        'gotanda_osaki' => '五反田・大崎',
        'daiba_ariake_toyosu' => '台場・有明・豊洲',
        'shimokitazawa_yoyogiuehara' => '下北沢・代々木上原',
        'sangenjaya_ikeziriohashi' => '三軒茶屋・池尻大橋',
        'kichijoji_ogikubo_asagaya' => '吉祥寺・荻窪・阿佐ヶ谷',
        'ikebukuro_meziro' => '池袋・目白',
        'kiyosumishirakawa_monzennakacho' => '清澄白河・門前仲町',
        'akihabara_kanda' => '秋葉原・神田',
        'ueno_asakusa' => '上野・浅草',
        'other' => 'その他',
      ][$this->area] ?? '未定';
    }

    public function getVoice(){
      return [
        1 => '非常に騒音',
        2 => 'やや騒音',
        3 => '普通',
        4 => 'やや静寂',
        5 => '非常に静寂',
      ][$this->voice] ?? '不明';
    }
    public function getCapacity(){
      return [
        1 => '非常に少ない',
        2 => 'やや少ない',
        3 => '普通',
        4 => 'やや多い',
        5 => '非常に多い',
      ][$this->capacity] ?? '不明';
    }
    public function getCuisine(){
      return [
        1 => '非常に少ない',
        2 => 'やや少ない',
        3 => '普通',
        4 => 'やや豊富',
        5 => '非常に豊富',
      ][$this->cuisine] ?? '不明';
    }

    public function liked_by_user(){
      $id = Auth::id();
      $likers = [];
      // likers配列にいいねをしたユーザーのidを入れる
      foreach($this->likes as $like){
        array_push($likers, $like->user_id);
      }
      // もしlikers配列の中にログインしているユーザーのidが入っていればtrue、無ければfalseを返す
      if(in_array($id, $likers)){
        return true;
      } else {
        return false;
      }
    }
}
