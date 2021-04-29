<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    public function service(){

        return $this->belongsToMany('App\service', 'provider_service');

    }

}
