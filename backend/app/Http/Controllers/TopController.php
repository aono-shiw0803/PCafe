<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class TopController extends Controller
{
  public function index(Request $request){
    $newShops = Shop::orderBy('id', 'desc')->paginate(3);
    $shops = Shop::orderBy('id', 'asc')->paginate(12);
    return view('tops.index', ['newShops'=>$newShops, 'shops'=>$shops, 'users'=>$request->users]);
  }
}
