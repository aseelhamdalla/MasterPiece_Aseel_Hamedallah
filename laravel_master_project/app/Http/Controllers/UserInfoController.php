<?php

namespace App\Http\Controllers;

use App\Category;
use App\user_info;
use App\User;
use App\booking;
use App\payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserInfoController extends Controller
{
  public function create($id)
  {
    $user = user_info::find($id);
    return view('provider.profile', ['user' => $user]);
  }




  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)

  {
    $request->validate([
      'phone'  => 'required',
      'date_of_birth'     => 'required',
      'nid'  => ['required', 'digits:10'],
      'address'     => 'required',

    ]);


    $user = User::find($id);
    if (isset($user->info)) {
      $details                = user_info::where('user_id', $id)->first();
      $details->phone         = $request->get('phone');
      $details->date_of_birth = $request->get('date_of_birth');
      $details->nid           = $request->get('nid');
      $details->address       = $request->get('address');

      if ($request->hasfile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/photo/', $filename);
        $details->image   = $filename;
      } else {
        $details->image = '';
      }
      $details->save();
    } else {

      $user = User::find($id);
      $users                        = new user_info();
      $users->phone                 = $request->get('phone');
      $users->date_of_birth         = $request->get('date_of_birth');
      $users->nid                   = $request->get('nid');
      $users->address               = $request->get('address');

      if ($request->hasfile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/photo/', $filename);
        $users->image   = $filename;
      } else {
        $users->image = '';
      }
      //  $user->info()->save($users);
      $user->info()->save($users);
    }
    return redirect('/provider_dashboard/'. Auth::user()->id);
  }




  public function show2(User $id)
  {
    $viewProfile = User::find($id);

    $id = Auth::user()->id;
    $services = User::find($id)->providerServices;

    $servicesCount = count($services);

    $id = Auth::user()->id;
    $bookingList = booking::where('provider_id', $id)->get();
    $bookingCount = count($bookingList);

    if (isset(User::find($id)->ProviderPayment->service_price) && (User::find($id)->ProviderPayment->service_price) !== null) {
      $lastPayment = User::find($id)->ProviderPayment->sortByDesc('id')->first()->service_price;
      $lastBookingDate = User::find($id)->ProviderPayment->sortByDesc('id')->first()->created_at;
    } else {
      $lastPayment = ': 0';
      $lastBookingDate = '"No payment yet"';
    }

    $user = User::where("id", $id)->get();
    foreach ($user as $one) {
      $RegDate = $one->created_at;
      $userID =  $one->id;
      $userEmail = $one->email;
    }
    //  dd($bookingCount); 
    return view('provider/provider_dashboard', compact('viewProfile', 'servicesCount', 'bookingCount', 'RegDate', 'userID', 'userEmail', 'lastPayment', 'lastBookingDate'));
  }
  //  ** *** *****************************************************



  public function showmain(user_info $id)
  {
    $viewProfile = user_info::find($id);
    View::share(['viewProfile' => $viewProfile]);
    return view('layout/public_main');
  }
  // ***************************************************************************

  public function showservice(User $id)
  {
    $viewProfile = User::find($id);
    $categories = Category::all();
    // dd($viewProfile);
    // $categories=new category(['name'=>'claening','imag'=>'desctest']);
    // dd($categories);
    View::share(['categories' => $categories]);
    View::share(['viewProfile' => $viewProfile]);
    return view('provider/add_service');
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\user_info  $user_info
   * @return \Illuminate\Http\Response
   */
  // public function edit(user_info $id)
  // {
  //     $edit = user_info::findOrFail($id);
  //     return view('provider/provider_dashboard', compact('edit'));
  // }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\user_info  $user_info
   * @return \Illuminate\Http\Response
   */


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\user_info  $user_info
   * @return \Illuminate\Http\Response
   */




  
}
