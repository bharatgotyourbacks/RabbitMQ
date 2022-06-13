<?php
namespace App\Jobs;
include '../../Jobs/SendEmail.php';
$a = new SendEmail();
print_r($a->mail_details);


$nq = new SplQueue();
$nq->enqueue('divya');
$nq->enqueue('hello');
$nq->rewind();
echo $nq->current();
$nq->dequeue();
$nq->rewind();
echo $nq->current();
?>
