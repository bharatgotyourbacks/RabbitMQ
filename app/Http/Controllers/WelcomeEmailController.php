<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Jobs\WelcomeEmailJob;

class WelcomeEmailController extends Controller
{
public function send(Request $request)
{
//WelcomeEmailJob::dispatch('jhansipitti@gmail.com');


dispatch(new WelcomeEmailJob('divyacharithap@gmail.com'));


//WelcomeEmailJob::dispatch('recipient@example.com')->onConnection('sqs')->onQueue('processing');
}
}
