<?php

namespace App\Listeners;

use App\Events\OtpEvent;
use App\Mail\Notifymail;
use App\Mail\SendEmailTest;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\otp;
use Illuminate\Support\Facades\Mail;

class OtpListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(OtpEvent $event)
    {
        $user=User::where('email', $event->email)->first();
        Mail::to($event->email)->send(new SendEmailTest($event->otp,$event->email));
        
    }
}
