<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('welcome', false, false, false, false);
for ($i = 0; $i<100; $i++)
{
$msg = new AMQPMessage('{"From":"divyacharitha@gmail.com",
 "to":divyapitti@mpokket.com,
 "Subject":"Regarding mpokket",
 "Message":"Welcome to mpokket"}',);
$channel->basic_publish($msg, '', 'welcome');

    echo " Sent \n";
}


$channel->close();
$connection->close();
