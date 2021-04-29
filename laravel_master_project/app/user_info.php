<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{

    protected $fillable=['image' ,'address', 'phone' , 'nid'  ,'date_of_birth']; 
    public function provider(){

        return $this->belongsTo('App\provider');

    }
    public function customer(){

        return $this->belongsTo('App\customer');

    }
    public function using(){

        return $this->belongsTo('App\User');
    }

  
}
