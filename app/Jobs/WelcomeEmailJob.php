<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\WelcomeEmail;
//use Mail;
//use
use Illuminate\Support\Facades\Mail;
class WelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $to;

    public function __construct($email)
    {
        $this->to = $email;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->to)->send(new WelcomeEmail);
    }
}
