<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function mypage($id)
  {
    $user = Auth::user();
    $reservations = Reservation::with('shop','course')->where('user_id', $id)->get();
    $likes = Like::with('shop.area','shop.genre')->where('user_id', $id)->get();
    return view('mypage', ['reservations' => $reservations, 'likes' => $likes, 'user' => $user]);
  }
}
