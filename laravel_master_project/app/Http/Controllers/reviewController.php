<?php

namespace App\Http\Controllers;

use App\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\service;

class reviewController extends Controller
{
  public function userReviewsPage($id)
  {
    $id = Auth::user()->id;
    $UserReviewsList  = User::find($id)->Reviewssssss;
    // $x= review::where('user_id',$id)->get();

    //  dd($UserReviewsList);
    // return $x;
    // foreach($UserReviewsList as $one ){
    //   return $one->service->image; 
    // }

    return view('user/reviews', compact('UserReviewsList'));
  }



  public function getreviewsList()
  {
    $reviews = review::all();
    // dd($custmers);   
    return view('dashboardPages.Manage_reviews', compact('reviews'));
  }

  public function delete($id)
  {
    review::where('id', $id)->delete();
    return redirect('/Manage_reviews');
  }



  public function showReviews($id)
  {
    $services = service::find($id);

    // *************************************************************To find user_id & then add avalability 
    $providerNo   = service::find($id)->Services;
    $ava = $providerNo->avalable;
    //****************************************************************************** */
    $reviews = review::where('service_id', '=', $id)->get();


    
    return view('publicPages/single', compact('services', 'ava', 'reviews'));
  }


  public function storeReviews(Request $request,$id)
  {

    $review               = new review();
    $review->service_id             = $request->get('service_id');
    $review->user_id              = $request->get('user_id');
    $review->rating           = $request->get('rating');
    $review->writehere     = $request->get('writehere');
    $review->save();


    
    return $this->showReviews($id);
  }


}
