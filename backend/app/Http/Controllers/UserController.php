<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
      $users = User::all();
      return view('users.index', ['users'=>$users]);
    }

    public function show(Request $request, User $user){
      $user = User::find($user->id);
      return view('users.show', ['user'=>$user]);
    }
}
