<?php

namespace App\Http\Controllers;

use App\Jobs\OtpJob;
use App\Jobs\RequestOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RabbitOtp extends Controller
{
//    public $result;
//    public function __constructor($email){
//        $this->result=$email;
//    }
    public function sendEmail(Request $request)
    {
        //echo "hello";
       // die();
        //return $request->all();
        // echo"hi";
        // dd("hello");
        $tomail = $request->email;
        $otp = rand(1000, 9999);
        //Log::info("otp = " . $otp);
//            $user = User::where('email', $request->email)->update(['otp' => $otp]);
        $affected = DB::table('users')
            ->where('email', $request->email)
            ->update(['otp' => $otp]);

        if ($affected) {
            // send otp in the email
            $mail_details = 'Testing Application OTP';
            $temp = 'Your OTP is : ' . $otp;
            $mail_details = $mail_details . '---' . $temp;

            // }
            //dispatch(new OtpJob($data));
            $job = (new RequestOtp($mail_details));
            $job->handle($request->email);
            //  $job = (new OtpJob(['email']));
            // ->delay(Carbon::now()->addSeconds(3));
           /* Mail::raw($mail_details, function($message) use ($email)
            {

                $message->to($email)
                    ->subject('Verify Your OTP');
            });*/
            //dd($job);
            dispatch($job);
            return $mail_details;
            //


        }

}
/*public function demo(Request $request){
       return 'hello';
        //echo hello
}*/
}
