<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Worker;
use PhpAmqpLib\Connection\AMQPStreamConnection;

       $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('task_queue', false, true, false, false);

        echo " Waiting for messages. \n";

       $callback = function ($msg) {

//            var_dump($msg->body);
//            var_dump($var);/
            echo '  Received ', $msg->body, "\n";
           // sleep(substr_count($msg->body, '.'));

//            echo "  Done\n";
           return $msg->body;


           // $encodeddata = json_decode($msg->body,true);
            //return ($encode);
//echo $encodeddata;


            // $r = Worker::insert($msg);
            // echo($r);
            // die();
        };
       // $r = $callback;
     //   print_r($r);




//
//        function storeData($data){
//            $obj = new Worker();
//            $obj->from=
//
//        }
//var_dump($callback);

      //  $channel->basic_qos(null, 1, null);
        $channel->basic_consume('task_queue', '', false, false, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();

