<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create(ReservationRequest $request) 
    {
        $date = $request->date;
        $carbon = Carbon::make($date);
        $time = $request->time;
        $t=explode(':',$time);
        $carbon->setHour($t[0]);
        $carbon->setMinute($t[1]);
        $datetime = $carbon->format('Y-m-d H:i');
        $param = [
            'reservationtime' => $datetime,
            'number' => $request->number,
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
        ];
        Reservation::create($param);
        return redirect('/done');
    }
    public function update(ReservationRequest $request)
    {
        $date = $request->date;
        $carbon = Carbon::make($date);
        $time = $request->time;
        $t=explode(':',$time);
        $carbon->setHour($t[0]);
        $carbon->setMinute($t[1]);
        $datetime = $carbon->format('Y-m-d H:i');
        $param = [
            'reservationtime' => $datetime,
            'number' => $request->number,
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
        ];
        unset($param['_token']);
        Reservation::find($request->id)->update($param);
        return back();
    }
    public function delete(Request $request)
    {
        Reservation::find($request->id)->delete();
        return back();
    }
    public function show(Request $request, $id)
    {
        $user = Auth::user();
        $shop = Shop::where("id", $request->shop_id)->first();
        $reservation = Reservation::all()->find($id);
        return view('reservation_detail', ['user' => $user, 'shop' => $shop, 'reservation' => $reservation]);
    }
    public function qrcode(Request $request)
    {
        $shopname = $request->shopname;
        $name = $request->name;
        $email = $request->email;
        $number = $request->number;
        $reservationdt = $request->reservationdt;
        return view('qrcode', ['shopname' => $shopname, 'name' => $name, 'email' => $email, 'number' => $number, 'reservationdt' => $reservationdt]);
    }
}
