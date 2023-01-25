<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
  public function store(RegisterRequest $request)
  {
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role,
    ]);
    return redirect('/admin/representative/add/complete');
  }
  public function mypage($id)
  {
    $user = Auth::user();
    $reservations = Reservation::with('shop','course')->where('user_id', $id)->get();
    $likes = Like::with('shop.area','shop.genre')->where('user_id', $id)->get();
    return view('mypage', ['reservations' => $reservations, 'likes' => $likes, 'user' => $user]);
  }
  public function destroy(Request $request)
  {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
