<?php

namespace App\Http\Controllers;

use App\avalability;
use Illuminate\Http\Request;

class AvalabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('provider/avalability');
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
    public function store(Request $request,$id)
    {
        $avalable                      = new avalability();
        $avalable->day                =$request->get('day'); 
        // $avalable->WeekDays           =$request->get('WeekDays'); 
        
        $avalable->from               =$request->get('from'); 
        $avalable->to                 =$request->get('to');
        $avalable->user_id            =$request->get('user_id');
        $avalable->status            =$request->get('status');
        $avalable->save();
          return redirect("/services/$id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\avalability  $avalability
     * @return \Illuminate\Http\Response
     */
    public function show()
    {  $var=avalability::find(2);
        // dd($var);
        return view('publicPages/single', compact('var')); }
      
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\avalability  $avalability
     * @return \Illuminate\Http\Response
     */
    public function edit(avalability $avalability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\avalability  $avalability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, avalability $avalability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\avalability  $avalability
     * @return \Illuminate\Http\Response
     */
    public function destroy(avalability $avalability)
    {
        //
    }
}
