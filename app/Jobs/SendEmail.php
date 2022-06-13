<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendingEmail;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Support\Facades\Mail;

//use Illuminate\Support\Facades\Mail;

//use App\Mail;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $detail)
    {
        $this->details = $detail;
    }
//        echo "hi";}
    //}welcomeemail

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       // echo "hi";
        // $email = new SendingEmail();
        $mail_details = 'Testing Application OTP';
        $temp = 'Your OTP is : ' . 4000;
        $mail_details = $mail_details . '---' . $temp;

       Mail::raw($mail_details, function ($message) {
           $message->to($this->details)
               ->subject('Verify Your OTP');
      });

    }
}
