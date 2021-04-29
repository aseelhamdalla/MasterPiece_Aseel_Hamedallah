<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Notification;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function info(){

    return $this->hasOne('App\user_info', 'user_id');
}
   

public function providerServices(){
    return $this->hasMany('App\service');}


    public function Reviewssssss(){
        return $this->hasMany('App\review' , 'user_id');}


        public function servicesToProvider(){
            return $this->hasMany('App\service' , 'user_id');}

            

public function avalable(){
    return $this->hasMany('App\avalability' ,'user_id');}




public function bookings(){
    return $this->hasMany('App\booking','user_id');}


    public function User(){
        return $this->hasOne('App\User','user_id');}

        public function Userid(){
            return $this->belongsTo('App\User','user_id');}

           
    public function ProviderPayment(){
        return $this->hasMany('App\payment','provider_id');}  

}
