<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
   public function Userreview() {

    return $this->belongsTo('App\User', 'user_id');

   }

   public function service() {

      return $this->belongsTo('App\service', 'service_id');
  
     }
}
