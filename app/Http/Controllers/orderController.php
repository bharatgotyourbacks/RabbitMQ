<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function index()
    {
        try {

            $min = 1;
            $max = 10000;
            $order = rand($min, $max);
            $message = "Thank you for using ecommerce your order number is:".$order;
Amqp::publish('routing-key', $message, ['queue' => 'test']);
} catch (Exception $exception) {
            dd($exception);
        }
    }
}
