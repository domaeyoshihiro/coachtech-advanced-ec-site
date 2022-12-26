<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Storage;


class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre','likes')->get();
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
        $user = Auth::user();
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
        return view('shop', ['shops' => $shops, 'user' => $user]);
    }
    public function create(ShopRequest $request) 
    {
        $image_name = $request->file('image')->getClientOriginalName();
        $image = Storage::putFileAs('public/img',$request->file('image'), $image_name);
        $param = [
            'shopname' => $request->shopname,
            'detail' => $request->detail,
            'image' => $image,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
        ];

        Shop::create($param);
        return redirect('/');
    }
}
