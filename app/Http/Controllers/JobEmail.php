<?php

namespace App\Http\Controllers;
use App\Mail\Mail;

use Illuminate\Http\Request;

class JobEmail extends Controller
{
    //
    public function SendEmail(){
        $details=[
            'body'=>"Regarding OTP"];
     //   Mail::to("divyacharithap@gmail.com")->send(new Mail($details));
        return "Email sent through Rabbit MQ";
    }
}
