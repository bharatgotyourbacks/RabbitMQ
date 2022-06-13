<?php

namespace App\Mail;

use App\Jobs\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendingEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

       /* Mail::to('divyacharithap@gmail.com')
            ->cc('divyapitti@gmail.com')
            ->bcc('divyapitti@gmail.com')
            ->queue(new SendingEmail());*/
        Mail::raw('Hi, welcome user!', function ($message) {
            $message->to("divyacharithap@gmail.com")
    ->subject("regarding otp");
});
    }
}
