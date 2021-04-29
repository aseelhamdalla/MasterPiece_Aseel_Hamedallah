@extends('layout.public_main')	
@section('section1')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4 theiaStickySidebar">
                <div class="mb-4">
                    @if(Auth::check())
                 <div class="mb-4">

                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                            @if(!empty(Auth::user()->info->image))

                            <img alt="profile image" src="{{asset('uploads/photo/'.Auth::user()->info->image)}}" class="avatar-lg rounded-circle">


                            @else
                           
                                    <img src="https://static1.squarespace.com/static/
									54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
                                    1519987239570/icon.png?format=1500w"  class="avatar-img rounded-circle"  alt="image" width="50px" height="50px">
                                    
                            @endif
                            <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                <h6 class="mb-0">{{Auth::user()->name}} </h6>
                                <p class="text-muted mb-0">Member Since May 2021</p>
                            </div>
                       
                        </div>
                    </div> 
            
                </div>
                <div class="widget settings-menu">
                    <ul>
                        <li class="nav-item">
                            <a href="user/dashboard/{{Auth::user()->id}}" class="nav-link ">
                                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a href="/my_booking/{{Auth::user()->id}}" class="nav-link active">
                                <i class="far fa-calendar-check"></i> <span>My Booking </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="profile/{{Auth::user()->id}}" class="nav-link">
                                <i class="far fa-user"></i> <span>Profile Settings</span>
                            </a>
                        </li>
                   
                     
                        <li class="nav-item">
                            <a href="provider-reviews.html" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="provider-payment.html" class="nav-link">
                                <i class="fas fa-hashtag"></i> <span>Payment</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h4 class="widget-title">Dashboard</h4>
                <div >
                 
                    <h6>There is no booking yet for you {{Auth::user()->name}}</h6>
        
                </div>
               
            </div>
        </div>
    </div>
</div>﻿
@endif
@endsection
