<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Course;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\ShopUpdateRequest;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class RepresentativeController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $shop = Shop::where('user_id', $id)->with('area', 'genre')->first();
        $areas = Area::all();
        $genres = Genre::all();
        return view('representative/representative_management', ['shop' => $shop, 'areas' => $areas, 'genres' => $genres]);
    }
    public function create(ShopRequest $request) 
    {   
        if (App::environment('production')) {
            $upload_info = Storage::disk('s3')->putFile('/', $request->file('image'), 'public');
            $image = Storage::disk('s3')->url($upload_info);
        } else {
            $image_name = $request->file('image')->getClientOriginalName();
            $image = Storage::putFileAs('public/img',$request->file('image'), $image_name);
        }
        $param = [
            'shop_name' => $request->shop_name,
            'detail' => $request->detail,
            'image' => $image,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::id(),
        ];

        Shop::create($param);
        return redirect('/representative/management');
    }
    public function update(ShopUpdateRequest $request)
    {
        $image = $request->file('image');
        $shop = Shop::where('id', $request->shop_id)->first();
        $path = $shop->image;
        if (!is_null($image)) {
            if (App::environment('production')) {
                $path = str_replace('https://ecsite-production-bucket.s3.ap-northeast-1.amazonaws.com/','',$path);
                Storage::disk('s3')->delete($path);
                $upload_info = Storage::disk('s3')->putFile('', $image, 'public');
                $path = Storage::disk('s3')->url($upload_info);
            } else {
                Storage::delete($path); 
                $image_name = $request->file('image')->getClientOriginalName();
                $path = Storage::putFileAs('public/img', $image, $image_name);
            }
        }
        $param = [
            'shop_name' => $request->shop_name,
            'detail' => $request->detail,
            'image' => $path,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::id(),
        ];
        unset($param['_token']);
        Shop::find($request->shop_id)->update($param);
        return back();
    }
    public function course($id)
    {
        $user = Auth::user();
        $shops = Shop::with('area', 'genre')->find($id);
        return view('representative/course_add', ['shops' => $shops, 'user' => $user]);
    }
    public function courseCreate(CourseRequest $request) 
    {
        $param = [
            'course_name' => $request->course_name,
            'price' => $request->price,
            'shop_id' => $request->shop_id,
        ];
        Course::create($param);
        return redirect('/representative/management');
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function reservationConfirmation($id)
    {
        $reservations = Reservation::where('shop_id', $id)->with('user', 'course')->get();
        return view('representative/reservation_confirmation', ['reservations' => $reservations]);
    }
}
