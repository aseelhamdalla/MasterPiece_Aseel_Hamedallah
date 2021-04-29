<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public function PaymentService(){

        return $this->belongsTo('App\service','service_id');
    }


    public function PaymentUser(){

        return $this->belongsTo('App\User','user_id');
    }
}
