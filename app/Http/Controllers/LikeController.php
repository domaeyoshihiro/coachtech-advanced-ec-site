<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    public function create(LikeRequest $request)
    {
        $likes = [
            'shop_id' => $request->id,
            'user_id' => $request->user_id,
        ];
        Like::create($likes);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $likes= Like::where("shop_id", $request -> id )->where("user_id", $request -> user_id )->delete();
        return back();
    }
}
