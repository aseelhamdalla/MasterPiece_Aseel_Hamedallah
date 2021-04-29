<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\provider;
use App\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(){
        return view ('publicIndex');
    }
    // public function userinformation(){
    //     return $this->hasOne('App\user_info');
    // }
    public function getproviderList()
    { 
          $providers=User::where('role','2')->get();
        // dd($providers);
        
        return view ('dashboardPages.Manage_providers' , compact('providers'));
    }


    public function delete($id)
    {
      User::where('id', $id)->delete();
      return redirect ('/Manage_providers');

    }

    
}
