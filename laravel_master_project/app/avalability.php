<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avalability extends Model
{
    public function UserAvalability(){
        return $this->belongsTo('App\User' ,'user_id');}


        // public function Avalability(){

        //     return $this->belongsTo('App\booking');
        // }
        public function bookavalable(){

            return $this->hasMany('App\booking');
        }
    

}
