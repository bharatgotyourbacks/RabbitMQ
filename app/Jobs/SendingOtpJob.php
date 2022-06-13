<?php

namespace App\Jobs;

use App\Events\OtpEvent;
use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;

class SendingOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $otp,$email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($otp,$email)
    {
        $this->otp = $otp;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //    echo $this->token.PHP_EOL;
        //    echo $this->email.PHP_EOL;
        //Log::info();
       Mail::to($this->email)->send(new SendEmailTest($this->otp, $this->email));
//        dd($data);
        event(new OtpEvent($this->otp,$this->email));
    }

}
