<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    //
    public static function getCode(){
        $next_code = \App\Code::next_code;
        if($next_code == null){
            $next_code = 'COD00001';
        } else {

        }
    }
}
