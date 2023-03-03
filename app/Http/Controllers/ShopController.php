<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Course;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre','likes')->get();
        if(is_null($user) || $user->role == 3) {
            return view('shop', ['shops' => $shops, 'user' => $user]);
        }
        if($user->role == 1) {
            return view('admin/admin_management');
        }
        if($user->role == 2) {
            $id = Auth::id();
            $shop = Shop::where('user_id', $id)->with('area', 'genre')->first();
            $areas = Area::all();
            $genres = Genre::all();
            return view('representative/representative_management', ['shop' => $shop, 'areas' => $areas, 'genres' => $genres]);
        }
    }
    public function show($id)
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre')->find($id);
        $courses = Course::where('shop_id', $id)->get();
        return view('detail', ['shops' => $shops, 'user' => $user, 'courses' => $courses]);
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $query = Shop::query();
        $shop_name = $request->input('shop_name');
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        if (!empty($shop_name)) {
            $query -> where('shop_name', 'LIKE', "%{$shop_name}%");
        }
        if (!empty($area_id)) {
            $query -> where('area_id', $area_id);
        }
        if (!empty($genre_id)) {
            $query -> where('genre_id', $genre_id);
        }
        $shops = $query->get();
        return view('shop', ['shops' => $shops, 'user' => $user]);
    }
}
