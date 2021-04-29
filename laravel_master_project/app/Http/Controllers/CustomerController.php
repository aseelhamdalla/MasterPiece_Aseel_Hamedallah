<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\customer;
use Illuminate\Http\Request;
use App\user_info;
use App\User;
use App\booking;
use App\review;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $id=Auth::user()->id;
      $bookingList =booking::where('user_id',$id)->get();
      $bookingCount=count($bookingList);
 if(isset(User::find($id)->bookings->service_price) && (User::find($id)->bookings->service_price)!== null  ){

    $lastBooking= User::find($id)->bookings->sortByDesc('id')->first()->service_price;
    $lastBookingDate= User::find($id)->bookings->sortByDesc('id')->first()->created_at;
  }else{
    $lastBooking= ': 0';
    $lastBookingDate='"No payment yet"';
  }
     $reviews =review::where('user_id',$id)->get();
     $reviewsCount=count($reviews);
     $user=User::where("id",$id)->get();
     foreach ($user as $one){
      $RegDate = $one->created_at;
      $userID=  $one->id;
      $userEmail=$one->email;
    }
     
    return view ('user/dashboard',compact('bookingCount','reviewsCount','RegDate','userID','userEmail','lastBooking','lastBookingDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user/profile');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $user= User::find($id);
      if(isset($user->info)){
       $details =user_info::where('user_id',$id)->first();
       $details->   phone        = $request->get('phone');
       $details->  date_of_birth = $request->get('date_of_birth');
       $details->            nid = $request->get('nid');
       $details->       address = $request->get('address');
      
        if ($request->hasfile('image')){
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= time(). '.'. $extension;
            $file->move('uploads/photo/',$filename);
            $details->image   =$filename;   
        }else{
          $details->image='';
        }   
        $details->save();
        }else{  
          
        $user= User::find($id);
         $users                             = new user_info();
         $users->phone                   =$request->get('phone'); 
         $users->date_of_birth         =$request->get('date_of_birth');
         $users->nid                   = $request->get('nid');
         $users->address               = $request->get('address');
      
         if ($request->hasfile('image')){
          $file=$request->file('image');
          $extension= $file->getClientOriginalExtension();
          $filename= time(). '.'. $extension;
          $file->move('uploads/photo/',$filename);
          $users->image   =$filename;   
      }else{
        $users->image='';
      }   
     
        //  $user->info()->save($users);
          $user->info()->save($users);  } 
          return redirect('/provider_dashboard/'.Auth::user()->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
    public function getcustmerList()
    {
          $custmers=User::where('role','3')->get();
        // dd($custmers);   
        return view ('dashboardPages.Manage_custmers' , compact('custmers'));   }
 


    public function delete($id)
    {
      User::where('id', $id)->delete();
      return redirect ('/Manage_custmers');

    }
}
