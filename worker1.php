<?php
use Illuminate\Support\Facades\DB;
use App\Models\Worker;

function returnTasks(){
    $r = (new importWorker)->worker();
    echo($r);
}


