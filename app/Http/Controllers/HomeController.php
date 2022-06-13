<?php

namespace App\Http\Controllers;

use App\Jobs\SendanEmailJob;
use App\Jobs\OtpJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Send email.
     *
     * @return void
     */
    public function sendMail()
    {
        $details['to'] = 'divya.pitti@mpokket.com';
        $details['name'] = 'Receiver Name';
        $details['subject'] = 'Regarding Welcome ';
        $details['body'] = 'Welcome to our App';

        $data=json_encode($details);
       // $details="hi";
      //  echo "$data";
        var_dump($data);
        //dispatch(new OtpJob($data));
        $job = (new OtpJob($data));
      //  $job = (new OtpJob(['email']));
           // ->delay(Carbon::now()->addSeconds(3));

        dispatch($job);

      //  return response('Email sent successfully');
    }
}
