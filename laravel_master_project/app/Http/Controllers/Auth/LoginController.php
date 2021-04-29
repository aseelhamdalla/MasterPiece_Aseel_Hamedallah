<?php

namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\Request;
use Illuminate\Http\Request as HttpRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function login(HttpRequest $request)
    {
        // return $request->all();
    // if(isset($request->remember)){
    //     $remember =true,
    // }

        if($request->isMethod('post')){
            $data=$request->input();
            // dd($data);
            if(Auth::attempt(['email' => $data['email'] , 'password' => $data['password']])){ 
                if(Auth::user()->role == 1){
                  return redirect('/dashboardPages');
      
                }   
                return redirect('landing');
             }else{
                return redirect('/login')->with('flash_message_error','Invalide email or password');
            }

            
      
       }}

       
    public function redirectTo(){
     
        switch (Auth::user()->role){
            case 1:
                $this->redirectTo ='/admin';
                return $this->redirectTo;
                break;

                case 2:
                    $this->redirectTo ='/provider';
                    return $this->redirectTo;
                    break;

                    case 3:
                        $this->redirectTo ='/user';
                        return $this->redirectTo;
                        break;
           
                        default:
                        $this->redirectTo ="/login";
                        return $this->redirectTo;
                        break;  }
                                      }
      
            
            
   
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        
        return view('publicPages.login');
    }
    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'    => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);


    // }
    public function logout() {
        Auth::logout();
    //    return view ('publicPages.landing');
        return redirect('landing');
      }

  
}
