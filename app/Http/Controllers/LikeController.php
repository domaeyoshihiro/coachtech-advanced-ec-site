<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre','likes')->get();
        $likes = [
            'shop_id' => $request->id,
            'user_id' => $request->user_id,
        ];
        Like::create($likes);
        return view('shop', ['shops' => $shops, 'user' => $user]);
    }
    public function delete(Request $request)
    {
        $likes= Like::where("shop_id", $request -> id )->where("user_id", $request -> user_id )->delete();
        return redirect('/');
    }
}
