<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function user_info(){

        return $this->hasOne('App\user_info');

    }
    
    public function service(){

        return $this->belongsToMany('App\service', 'provider_service');

    }
    
}
