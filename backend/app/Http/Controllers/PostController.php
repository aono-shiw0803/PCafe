<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){
      return view('posts.index', ['weeks'=>$weeks]);
    }
}
