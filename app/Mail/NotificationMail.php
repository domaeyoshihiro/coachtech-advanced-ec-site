<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct($name, $email, $subject, $title, $detail)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->title = $title;
        $this->detail = $detail;
    }

    public function build()
    {
        return $this->to($this->email)
            ->subject($this->subject)
            ->view('admin/notification_mail')
            ->with([
                'name' => $this->name,
                'title' => $this->title,
                'detail' => $this->detail,
            ]);
    }
}
