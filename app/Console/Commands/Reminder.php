<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderMail;

class Reminder extends Command
{
    protected $signature = 'reminder';
    protected $description = 'リマインダー';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $reservations = Reservation::all();
        foreach ($reservations as $reservation) {
            $reservationtime = $reservation->reservationtime;
            $reservationtimecarbon = new Carbon($reservationtime);
            $reservationdt = $reservationtimecarbon->format("Y/m/d H:i");
            $reservationdate = $reservationtimecarbon->format("Y-m-d");
            $dtnow = Carbon::now()->format("Y-m-d");
            if($reservationdate == $dtnow) {
                $shop_id = $reservation->shop_id;
                $shop = Shop::where("id", $shop_id)->first();
                $shopname = $shop->shopname;
                $number = $reservation->number;
                $user_id = $reservation -> user_id;
                $user = User::where("id", $user_id)->first();
                $name = $user->name;
                $email = $user->email;
                Mail::send(new ReminderMail($name, $email, $shopname, $number, $reservationdt));
            }
        }
    }
}
