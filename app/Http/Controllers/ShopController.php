<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\CourseRequest;
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
        $courses = Course::where('shop_id', $id)->get();
        return view('detail', ['shops' => $shops, 'user' => $user, 'courses' => $courses]);
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
    public function course($id)
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre')->find($id);
        return view('course_add', ['shops' => $shops, 'user' => $user]);
    }
    public function courseCreate(CourseRequest $request) 
    {
        $param = [
            'coursename' => $request->coursename,
            'price' => $request->price,
            'shop_id' => $request->shop_id,
        ];
        Course::create($param);
        return redirect('/');
    }
}
