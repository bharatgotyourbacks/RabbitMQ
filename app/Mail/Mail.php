<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class Mail extends Mailable
{
    use Queueable, SerializesModels;
 protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( )
    {
      // $this->details=$detail;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//return    $this->subject('Testing Email');
      //return $this->from('divyacharithap@gmail.com')->subject('Regarding OTP');
       return $this->view('view.Email.testemail');
    }

   /* public function raw($text, $callback)
    {
        // TODO: Implement raw() method.
    }*/
}
