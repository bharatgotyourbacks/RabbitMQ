<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, true, false, false);

//$data = implode(' ', array_slice($argv, 1));
//for ($i =0; $i<=10000000; $i++) {

    if (empty($data)) {
       // $data = "Hello World!...";
        $data=["from"=>"divyacharitha@gmail.com",
 "to"=>"divyapitti@mpokket.com",
 "subject"=>"Regarding mpokket",
 "body"=>"Welcome to mpokket"];

    }
//    echo "<pre>";
//    var_dump($data);
//    die();
    $jsondata=json_encode($data);
    $msg = new AMQPMessage(
        $jsondata,
        array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));

//    var_dump($jsondata);
//    die();
//echo $msg;
    $channel->basic_publish($msg, '', 'task_queue');

    echo '  Sent ', $jsondata, "\n";
//}
$channel->close();
$connection->close();
