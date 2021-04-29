<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\booking;
use Illuminate\Http\Request;
use App\service;
use App\avalability;
// use Illuminate\Notifications\DatabaseNotification as BaseDatabaseNotification;

// use App\Notifications\AcceptToService;
use App\Notifications\BookingToConfirm;
use App\Notifications\AcceptToService;
use App\Notifications\RejectByProvider;

use App\User;
use App\user_info;
use DB;
use Illuminate\Notifications\Notifiable;

// use Notification;

use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
  use Notifiable;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */




  public function index()
  {
    return view("booking");
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function bookingform(request $request, $id)
  {
    $providerNo   = service::find($id)->Services;
    $avalabilites = $providerNo->avalable;

    foreach ($avalabilites as $avalability) {
      if (booking::where([['avalability_id', $avalability->id], ['is_taken', 'yes']])->exists()) {
        avalability::where('id', '=', $avalability->id)->update(['status' => 'not avalable']);
      }
    }


    $services = service::find($id);

    return view('/booking', compact('services', 'avalabilites'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $request->validate([
      'avalability_id'  => 'required',
      'notes'     => 'required',


    ]);

    $booking = new booking();
    $booking->user_id           = $request->get('user_id');
    $booking->service_location          = $request->get('service_location');
    $booking->provider_name          = $request->get('provider_name');
    $booking->provider_id          = $request->get('provider_id');
    $booking->provider_phone        = $request->get('provider_phone');
    $booking->service_price          = $request->get('service_price');
    $booking->service_name          = $request->get('service_name');
    $booking->status            = $request->get('status');
    $booking->is_taken            = $request->get('is_taken');
    $booking->notes             = $request->get('notes');
    $booking->avalability_id    = $request->get('avalability_id');
    $booking->service_id        = $request->get('service_id');
    $booking->save();

    User::where('id', $booking->provider_id)->get()
      ->each(function ($user) use ($booking) {
        $user->notify(new BookingToConfirm($booking));
      });



    return redirect('my_booking/' . Auth::user()->id);
  }




  public function mybooking($id)
  {
    $y = $custmerBooking   = User::find($id)->bookings->sortByDesc('id')->values();
    // dd($y);
    if ($y->isNotEmpty()) {
      foreach ($y as $onebook) {
        $poviderNumber = $onebook->provider_id;
        $providerInfo = user_info::where('user_id', '=', $poviderNumber)->first();
        // dd($providerInfo->image);
      }

      if (isset($_GET['sort2'])  && !empty($_GET['sort2'])) {
        if ($_GET['sort2'] == "Pending"  && !empty($providerInfo)) {
          $y = $custmerBooking->where('status', 'pending')->values();
        } elseif ($_GET['sort2'] == "Inprogress"  && !empty($providerInfo)) {
          $y = $custmerBooking->where('status', 'inprogress')->values();
        } elseif ($_GET['sort2'] == "Completed" && !empty($providerInfo)) {
          $y = $custmerBooking->where('status', 'completed')->values();
        } elseif ($_GET['sort2'] == "all" && !empty($providerInfo)) {
          $y = $custmerBooking   = User::find($id)->bookings;
        }
      };
      $currentdate = date('Y-m-d');
      // dd($currentdate);
      foreach ($y as $onebook) {
        $avalabilityForBooking = $onebook->avalability->day;
        // ******TO make booking complete after time************
        $hourdiff =  ((strtotime($avalabilityForBooking)) - (strtotime($currentdate)));
        //  dd($hourdiff);
        $id = $onebook->id;
        if ($hourdiff <= 0) {
          booking::where('id', '=', $id)->update(['status' => 'completed']);
        }
        // ******TO make booking  cancle within 24 ***********
      $cancleTime = ((strtotime($currentdate)) - (strtotime($avalabilityForBooking)));
    
      }
    } else {
      $providerInfo = '';
      
      return redirect('/noBookingUser');
    }


    if (isset($cancleTime)) {
    
    } else {
      // dd('no');
      $cancleTime = '';
    }



    return view('user/my_booking', compact('y', 'providerInfo', 'cancleTime'));
  }


  /**
   * Display the specified resource.
   *
   * @param  \App\booking  $booking
   * @return \Illuminate\Http\Response
   */
  public function showBookList($id)
  {

    $id = Auth::user()->id;
    $y = $bookingList = booking::where('provider_id', $id)->get()->sortByDesc('id')->values();
    if (empty($y)) {
      return redirect('/noBooking');
    }

    foreach ($y as $test) {
      $proId = $test->provider_id;
      $proInfo = user_info::where('user_id', '=', $proId)->get();
    }

    if (isset($_GET['sort3'])  && !empty($_GET['sort3'])) {
      if ($_GET['sort3'] == "Pending") {
        $y = $bookingList->where('status', 'pending')->values();
      } elseif ($_GET['sort3'] == "Inprogress") {
        $y = $bookingList->where('status', 'inprogress')->values();
      } elseif ($_GET['sort3'] == "Completed") {
        $y = $bookingList->where('status', 'completed')->values();
      } elseif ($_GET['sort3'] == "RejectedByProvider") {
        $y = $bookingList->where('status', 'RejectedByProvider')->values();
      } elseif ($_GET['sort3'] == "all") {
        $y = $bookingList = booking::where('provider_id', $id)->get();
      }
    }
    if (!isset($proInfo) && empty($proInfo)) {
      return redirect('/noBooking');
    }


    return view('provider/booking_list', compact('y', 'proInfo'));
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\booking  $booking
   * @return \Illuminate\Http\Response
   */


  public function accept($id)
  {

    booking::where('id', '=', $id)->update(['status' => 'inprogress']);

    $user_id = booking::find($id)->userBook;

    $Provider = booking::find($id)->avalability->UserAvalability;


    $service =  booking::find($id)->bookservice;

    $user_id->notify(new AcceptToService($Provider, $service));

    return redirect('provider_dashboard/booking_list/' . Auth::user()->id);
  }


  public function rejecte($id)
  {
    booking::where('id', '=', $id)->update(['status' => 'RejectedByProvider']);
    $user_id  = booking::find($id)->userBook;
    $Provider = booking::find($id)->avalability->UserAvalability;
    $service  =  booking::find($id)->bookservice;
    //  $x = $id;
    //  $y=$x->avalability;

    //  dd($x);
    // avalability::where('id', '=', $avalability->id)->update(['status' => 'not avalable']);

    // dd($user_id);

    $user_id->notify(new RejectByProvider($Provider, $service));

    return redirect('provider_dashboard/booking_list/' . Auth::user()->id);
  }




  public function complete($id)
  {

    booking::where('id', '=', $id)->update(['status' => 'completed']);
    return redirect('my_booking/' . Auth::user()->id);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\booking  $booking
   * @return \Illuminate\Http\Response
   */
  // public function update(Request $request, booking $booking)
  // {
  //     //
  // }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\booking  $booking
   * @return \Illuminate\Http\Response
   */

  public function destroy($id)
  {
    // Auth::user()->notify(new BookingToConfirm());
    booking::where('id', $id)->delete();

    return redirect('my_booking/' . Auth::user()->id);
  }


  public function getbookingsList()
  {
    $bookings = booking::all();
    // dd($custmers);   
    return view('dashboardPages.Manage_booking', compact('bookings'));
  }

  public function deletebook($id)
  {
    booking::where('id', $id)->delete();
    return redirect('/Manage_booking');
  }
}
