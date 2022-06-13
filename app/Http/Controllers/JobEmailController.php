<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mail;
//use Illuminate\Support\Facades\Mail;
class JobEmailController extends Controller
{
    //
    public function SendEmail()
    {
        $details = [
            'body' => "Regarding OTP"];
      //  Mail::to("divyacharithap@gmail.com")->send(new Mail($details));
      //  return "Email sent through Rabbit MQ";
    }
}
