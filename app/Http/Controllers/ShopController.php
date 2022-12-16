<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre','likes.user')->get();

        return view('shop', ['shops' => $shops, 'user' => $user]);
    }
    public function show($id)
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre')->find($id);
        return view('detail', ['shops' => $shops, 'user' => $user]);
    }
    public function search(Request $request)
    {
        $query = Shop::query();
        $shopname = $request->input('shopname');
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        if (!empty($shopname)) {
            $query -> where('shopname', 'LIKE', "%{$shopname}%");
        }
        if (!empty($area_id)) {
            $query -> where('area_id', $area_id);
        }
        if (!empty($genre_id)) {
            $query -> where('genre_id', $genre_id);
        }
        $shops = $query->get();
        return view('shop', ['shops' => $shops]);
    }
}
