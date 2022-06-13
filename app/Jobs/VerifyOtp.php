<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class VerifyOtp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {


        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        public function verify_otp(Request $request){

        $email=$request->email;
        $otp=$request->otp;

        $verify=DB::table('users')
            ->where('email',$email )
            ->where('otp',$otp)
            ->update(['email_status' => 1]);



        if($verify)
        {
            return response(["status" => 200, "message" => "OTP verified successfully"]);
        }
        else{
            return response(["status" => 401, "message" => "OTP invalid "]);
        }
    }

        //
    }
}
