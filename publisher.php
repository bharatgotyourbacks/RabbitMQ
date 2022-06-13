<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

class Publisher{
    public function import($id){
        $r =User::select('id');

        $t = DB::table('users')->select('first_name','email')
            ->where('id','=',$id)->first();

        $name = $t->first_name;
        $email =$t->email;
    }
}
