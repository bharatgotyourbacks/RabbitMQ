<?php
use App\Http\Controllers\WelcomeEmailController;
//use App\Jobs\RabbitMqJob;
use App\Jobs\SendWelcomeEmailJob;
use App\Http\Controllers\JobEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendEmail;
use App\Mail\SendEmailTest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/send-mail', function () {
   dispatch(new App\Jobs\SendEmail('divyacharithap@gmail.com'));
    dd('Sending via RabbitMQ');
   // return  \App\Jobs\SendEmail::dispatch();

});
Route::get('/email_test',function (){
    $details['email']='divyacharithap@gmail.com';
    dispatch(new \App\Jobs\Email($details));
    dd("email send through rabbitmq");
});
//Route::get('/sende',JobEmail::class);
Route::get('/sendemail',[\App\Http\Controllers\JobEmailController::class,'SendEmail']);


Route::get('email-test', function(){

    $details['email'] = 'your_email@gmail.com';

   // dispatch(new App\Jobs\SendEmailJob($details));

    dd('Send Email Successfully');
});
//Route::get('send-email', function(){
   // dispatch(new App\Jobs\SendWelcomeEmailJob());
//});

//...
Route::get('send-email', function(){
    dispatch(new SendWelcomeEmailJob());
});
Route::get('/sendemail',function (){
    $data['email']="divyacharithap@gmail.com";
    dispatch(new App\Jobs\RabbitMqJob($data));
dd('Sent mail via rabbit mq');
//echo "hi";
});
Route::get('welcome', 'WelcomeEmailController@send');
Route::get('sendingmail', 'HomeController@sendMail');

*/

/*Route::get('sending_email', function(){

    $details= 'divya.pitti@mpokket.com';
   dispatch(new App\Jobs\OtpJob($details));
    //dispatch(new App\Jobs\SendanEmailJob($details));
    //dispatch(new App\Jobs\OtpJob($details));
    //Mail::to("divya.pitti@mpokket.com")->send(new SendEmailTest());
    dd('done');
});*/
Route::get('/testapi', 'orderController@index')->name('testapi');
Route::get('/send_mail', [\App\Http\Controllers\HomeController::class,'sendMail']);
Route::get("/request_otp", [\App\Http\Controllers\OtpController::class,'requestOtp']);


Route::get("/verify_otp", [\App\Http\Controllers\OtpController::class,'verify_otp']);
Route::post("/request_Otp", [\App\Http\Controllers\RabbitOtp::class,'sendEmail']);
Route::post("/demo", [\App\Http\Controllers\RabbitOtp::class,'demo']);
