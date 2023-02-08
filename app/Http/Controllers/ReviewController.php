<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre')->find($id);
        $reviews = Review::with('shop', 'user')->where("shop_id", $id)->get();
        return view('list', ['shops' => $shops, 'reviews' => $reviews, 'user' => $user]);
    }
    public function show(Request $request, $id)
    {
        $reservationtime = $request->reservationtime;
        $dtnow = Carbon::now()->format("Y-m-d H:i:s");
        
        if($dtnow > $reservationtime) {
            $user = Auth::user();
            $shops = Shop::with('area', 'genre')->find($id);
            return view('review', ['shops' => $shops, 'user' => $user]);
        } else {
            return back()->with('message', '来店後に評価できます。');
        }
    }
    public function create(ReviewRequest $request) 
    {
        $param = [
            'comment' => $request->comment,
            'star' => $request->star,
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
        ];
        Review::create($param);
        return redirect('/complete');
    }
}
