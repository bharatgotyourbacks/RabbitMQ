<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    //public function __construct()
    // {
    // }

    /* public function build()
     {
         //The mails.welcomeemail is a html blade template
         //the mails.welcomeemail-text is a text blade template as a fallback
         //either one can be removed if we want to only send html or text email
         return $this->from('divyacharithap@gmail.com', 'Divya')
             ->subject('Welcome')
             ->view('view.Email.testmail');
            // ->text('mails.welcomeemail-text');
     }
 }*/
}
