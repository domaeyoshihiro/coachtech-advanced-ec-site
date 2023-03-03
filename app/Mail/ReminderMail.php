<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct($name, $email, $shop_name, $number, $reservationdt)
    {
        $this->name = $name;
        $this->email = $email;
        $this->shop_name = $shop_name;
        $this->number = $number;
        $this->reservationdt = $reservationdt;
    }
    public function build()
    {
        return $this->to($this->email)
        ->subject('ご予約当日です。')
        ->view('reminder_mail')
        ->with(['name' => $this->name, 'shopname' => $this->shop_name, 'number' => $this->number, 'reservationdt' => $this->reservationdt]); 
    }
}
