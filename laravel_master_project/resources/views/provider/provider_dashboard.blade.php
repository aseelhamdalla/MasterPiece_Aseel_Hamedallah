@extends('layout.public_main')	
@section('section1')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4 theiaStickySidebar">
                <div class="mb-4">
                    @if(Auth::check())
                    @if(!empty(Auth::user()->info->image))
                 <div class="mb-4">

                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                            <img alt="profile image" src="{{asset('uploads/photo/'.Auth::user()->info->image)}}" class="avatar-lg rounded-circle">


                            @else
                            <div class="mb-4">
                                <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
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
                            <a href="/provider_dashboard/{{Auth::user()->id}}" class="nav-link active">
                                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/add_service/{{Auth::user()->id}}" class="nav-link ">
                                <i class="fas fa-plus-circle"></i> <span>Add Service</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/services/{{Auth::user()->id}}" class="nav-link">
                                <i class="far fa-address-book"></i> <span>My Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="booking_list/{{Auth::user()->id}}" class="nav-link">
                                <i class="far fa-calendar-check"></i> <span>Bookings List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/profile/{{Auth::user()->id}}" class="nav-link">
                                <i class="far fa-user"></i> <span>Profile Settings</span>
                            </a>
                        </li>
                   
                        <li class="nav-item">
                            <a href="/avalable/{{Auth::user()->id}}" class="nav-link">
                                <i class="far fa-clock"></i> <span>Availability</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="/ProviderPayment/{{Auth::user()->id}}" class="nav-link">
                                <i class="fas fa-hashtag"></i> <span>Payment</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h4 class="widget-title">Dashboard</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="provider-bookings.html" class="dash-widget dash-bg-1">
                            <span class="dash-widget-icon">{{$bookingCount}}</span>
                            <div class="dash-widget-info">
                                <span>Bookings</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="my-services.html" class="dash-widget dash-bg-2">
                            <span class="dash-widget-icon">{{$servicesCount}}</span>
                            <div class="dash-widget-info">
                                <span>Services</span>
                            </div>
                        </a>
                    </div>
        
                </div>
                <div class="card mb-0">
                    <div class="row no-gutters">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h6 class="title">Plan Details</h6>
                                <div class="sp-plan-name">
                                    <h6 class="title">
                                        Gold <span class="badge badge-success badge-pill">Active</span>
                                    </h6>
                                    <p>user ID: <span class="text-base">{{$userID}}</span></p>
                                </div>
                                <ul class="row">
                                    <li class="col-6 col-lg-6">
                                        <p>Join on &nbsp &nbsp  {{$RegDate}}</p>
                                    </li>
                                    <li class="col-6 col-lg-6">
                                        <p>{{$userEmail}}</p>
                                    </li>
                                </ul>
                                <h6 class="title">Last Payment</h6>
                                <ul class="row">
                                    <li class="col-sm-6">
                                        <p>Paid at  &nbsp &nbsp  {{$lastBookingDate}}</p>
                                    </li>
                                    <li class="col-sm-6">
                                        <p><span class="text-success">Paid &nbsp </span>  {{$lastPayment}}  <span class="amount"></span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            {{-- <div class="sp-plan-action card-body">
                                <div class="mb-2">
                                    <a href="provider-subscription.html" class="btn btn-primary"><span>Change Plan</span></a>
                                </div>
                                <div class="next-billing">
                                    <p>Next Billing on <span>15 Jul, 2021</span></p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>﻿
@endif
@endsection
