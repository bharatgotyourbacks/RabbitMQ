<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('welcome', false, false, false, false);

echo "  Waiting for messages. \n";

$callback = function ($msg) {
   // echo '  Received ', $msg->body, "\n";
};

$channel->basic_consume('welcome', '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}
