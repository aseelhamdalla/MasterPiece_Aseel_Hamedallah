<?php

namespace App\Http\Controllers;
use App\User;
use App\payment;
use Illuminate\Http\Request;
use Auth;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $payment =new payment();
    $payment->service_id          = $request->get('service_id');
    $payment->user_id             = $request->get('user_id');
    $payment->provider_name       = $request->get('provider_name');
    $payment->provider_id         = $request->get('provider_id');
    $payment->service_price       = $request->get('service_price');
    $payment->status              = $request->get('status');
    $payment->EndService              = $request->get('EndService');
    
    $payment->service_name              = $request->get('service_name');
    $payment->save();

    return redirect('/ProviderPayment/'.Auth::user()->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function ProPayment($id){
        $payments = payment::where('provider_id', '=', $id)->get(); 
//         foreach($payments as $onePayment){
//           $y=  $onePayment->PaymentUser->info->image;
//         }
//    return $y ;
             return view('provider/ProviderPayment',compact('payments'));  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }


   public function getPaymentsList(){
    $patyments = payment::all();
    // dd($custmers);   
    return view('dashboardPages.Manage_Payment', compact('patyments'));
   }


   
}
