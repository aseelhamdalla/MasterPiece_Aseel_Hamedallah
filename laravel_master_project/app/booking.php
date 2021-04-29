<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    public function bookservice(){

        return $this->belongsTo('App\service','service_id');
    }

    // public function bookavalable(){

    //     return $this->hasOne('App\avalability',  'avalability_id' );
    // }

    public function avalability(){

        return $this->belongsTo('App\avalability','avalability_id');
    }
  
    

    public function userBook(){
     return $this->belongsTo('App\User', 'user_id');}
    

}
