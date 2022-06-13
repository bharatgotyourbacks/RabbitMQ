<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;
use function Illuminate\Events\queueable;
use App\Http\Controllers\SendOtpController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailTest;


class OtpEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $otp,$email;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($otp,$email)
    {
        $this->otp = $otp;
        $this->email = $email;
    }

    public function boot()
    {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
