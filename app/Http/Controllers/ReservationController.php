<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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
    public function delete(Request $request)
    {
        Reservation::find($request->id)->delete();
        return redirect('/mypage');
    }
}
