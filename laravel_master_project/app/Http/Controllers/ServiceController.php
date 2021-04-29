<?php

namespace App\Http\Controllers;

use App\Category;
use App\avalability;
use App\review;
use Session;
use Carbon\Carbon;
use App\booking;
use App\service;
use App\User;
use App\reviews;
use App\user_info;
use Dotenv\Regex\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
// use LaravelForum\Notifications\AcceptToService;
use Illuminate\Support\Facades\Notification;
//  use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboardPages.Manage_services');
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function proservice($id)
  {
         $services = User::find($id)->providerServices;

    // if(empty($services) || !isset($services)) {
    //   return redirect('/noService');
    // }else{
      
    // }

    return view('services', compact('services'));
  }





  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {
    $request->validate([
      'name'  => 'required',
      'provider_name'     => 'required',
      'provider_phone'    => 'required',
      'price'  => 'required',
      'location'     => 'required',
      'desc'    => 'required',

    ]);


    $service                 = new service();
    $service->name           = $request->get('name');
    $service->provider_name  = $request->get('provider_name');
    $service->provider_phone   = $request->get('provider_phone');

    $service->price          = $request->get('price');
    $service->desc           = $request->get('desc');
    $service->location       = $request->get('location');
    $service->image          = $request->get('image');
    $service->category_id    = $request->get('category_id');
    $service->user_id    = $request->get('user_id');

    if ($request->hasfile('image')) {
      $file = $request->file('image');
      $extension = $file->getClientOriginalExtension();
      $filename = time() . '.' . $extension;
      $file->move('uploads/photo/', $filename);
      $service->image = $filename;
    } else {
      // return $request;
      $service->image = '';
    }
    $service->save();

    return redirect('services/' . Auth::user()->id)->with('record_added', 'New service has been created successfully');;
    //  ->with('record_added','New service has been created successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\admins  $admins
   * @return \Illuminate\Http\Response
   */



  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\admins  $admins
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // $serviceedit = service::where('id','=',$id)->first();
    $serviceedit = service::find($id);
    return view('edit_service', [
      'serviceedit' => $serviceedit
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\admins  $admins
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $service)
  {
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $ext = $file->getClientOriginalExtension();
      $filename = time() . '.' . $ext;
      $file->move('uploads/photo/', $filename);
    } else {
      // return $request;
      $filename = service::find($service)->image;
    }


    service::where('id', '=', $service)->update([
      'name'         => $request->get('name'),
      'provider_name'   => $request->get('provider_name'),
      'provider_phone'   => $request->get('provider_phone'),
      'price'          => $request->get('price'),
      'location'       => $request->get('location'),
      'desc'           => $request->get('desc'),
      'image'     => $filename,
      // 'category_id'    =>$request->get('category_id'),   
    ]);
    Session::flash('record_updated', 'One service has been updated successfully');
    return redirect('services/' . Auth::user()->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\admins  $admins
   * @return \Illuminate\Http\Response
   */
  public function delet($id)
  {
    $service = service::find($id);
    $service->delete();
    Session::flash('record_delete', 'One service has been deleted successfully');

    return redirect('services/' . Auth::user()->id);
  }


  public function single($id)
  {
    // $id=provider_id;
    $providerNo   = service::find($id)->Services;

    // dd($providerNo);
    if (!empty($providerNo)) {
      $ava = $providerNo->avalable;
    }
    // dd($ava);
    foreach ($ava as $avalability) {
      if (booking::where([['avalability_id', $avalability->id], ['is_taken', 'yes']])->exists()) {
        avalability::where('id', '=', $avalability->id)->update(['status' => 'not avalable']);
      }
    }
    $services = service::find($id);
    // dd($services);
    $catName = $services->cat->name;
    $RelatedServices = $services->cat->service;

    $reviews = review::where('service_id', '=', $id)->get();

    $avg = review::where('service_id', '=', $id)->avg('rating');
    $reviewSum = round($avg);
    // dd($reviewSum);

    return view('publicPages/single', compact('services', 'ava', 'reviews', 'reviewSum', 'catName', 'RelatedServices'));
  }


  public function getserviceList()
  {
    $services = service::all();
    return view('dashboardPages.Manage_services', compact('services'));
  }


  public function delete($id)
  {
    service::where('id', $id)->delete();
    return redirect('/Manage_services');
  }


  public function search()
  {
    $services = service::where('name', 'like', '%' . request('name') . '%')
      ->where('location', 'like', '%' . request('location') . '%')->get();

    //  dd($services); 
    $serviesNo = count($services);

    return view('search', compact('services', 'serviesNo'));
  }
}
