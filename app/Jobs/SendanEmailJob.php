<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;
//use Mail;
//use App\Mail;
class SendanEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details=json_decode($details);
        echo "hello";
        var_dump($this->details);
       // $this->details = $details;
        $this->handle();


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "hi";

      $email = new SendEmailTest();
        Mail::to($this->details['to'])->send($email);

    }
}
