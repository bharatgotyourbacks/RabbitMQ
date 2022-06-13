<?php

DB::table('workers')->insert(['from'=>$msg->from,'to'=> $msg->to,'subject'=>$msg->subject,'body'=>$msg->body]);
