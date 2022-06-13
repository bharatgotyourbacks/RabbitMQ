<?php

namespace App\Http\Controllers;

use App\Events\OtpEvent;
use App\Jobs\SendingOtpJob;
use App\Models\otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SendOtpController extends Controller
{
    //
public function sendEmail(Request $request){

        if (!$this->validateEmail($request->email)) {
            return $this->failedResponse();
        }
        $this->send($request->email);

        return $this->successResponse();
    }

    public  function send($email)
    {
        $otp = $this->createOtp($email);
        dispatch(new SendingOtpJob($otp,$email));
        event(new OtpEvent($otp,$email));

    }

    public function createOtp($email)
    {
        $oldOtp = DB::table('otps')->where('email', $email)->first();

        if ($oldOtp) {
            return $oldOtp->otp;
        }

        $otp = rand(1000,9999);
        $this->saveOtp($otp, $email);
        return $otp;
    }


    public function saveOtp($otp, $email)  // this function save new password
    {
        DB::table('otps')->insert([
            'email' => $email,
            'otp' => $otp,
            'created_at' => Carbon::now()
        ]);
    }



    public function validateEmail($email)  //this is a function to get your email from database
    {
        return !!User::where('email', $email)->first();
    }

    public function failedResponse()
    {
        return response()->json([
            'error' => 'Email does\'t found on our database'
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse()
    {
        return response()->json([
            // 'data' => 'Reset Email is send successfully, please check your inbox.'
            'data' => 'Otp sent to your registered mail'
        ], Response::HTTP_OK);
    }

}
