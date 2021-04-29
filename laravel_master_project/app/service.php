<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{

    protected $fillable = ['name' , 'price', 'location', 'desc','category_id'  ];

    // public function category(){
    //     return $this->belongsTo('App\Category');
    // }

    
    public function Services(){

        return $this->belongsTo('App\User','user_id');

    }
    
    public function ProviderService() {

        return $this->belongsTo('App\User', 'user_id');
    
       }

       public function bookService() {

        return $this->hasMany('App\booking', 'service_id');
    
       }
       
       public function reviewService() {

        return $this->hasMany('App\review', 'service_id');
    
       }



       public function cat(){

        return $this->belongsTo('App\Category','category_id');

    }

    public function ServicePayment() {

        return $this->hasMany('App\payment', 'service_id');
    
       }
}
