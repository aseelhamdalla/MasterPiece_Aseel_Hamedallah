@extends('layout.public_main')	
@section('section1')
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4">
						<div class="mb-4">
							<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
@if(isset(Auth::user()->info->image)  && !empty(Auth::user()->info->image) )
								<img alt="profile image" src="{{asset('uploads/photo/'.Auth::user()->info->image)}}"   class="avatar-lg rounded-circle">
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
                        <div class="widget settings-menu">
                            <ul>
                                <li class="nav-item">
                                    <a href="/provider_dashboard/{{Auth::user()->id}}" class="nav-link">
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
                                    <a href="/booking_list/{{Auth::user()->id}}" class="nav-link active">
                                        <i class="far fa-calendar-check"></i> <span> Bookings list  </span>
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
                                    <a href="provider-reviews.html" class="nav-link">
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
						<div class="row align-items-center mb-4">
							<div class="col">
								<h4 class="widget-title mb-0"> Booking list</h4>
							</div>
							<div class="col-auto">
								<div class="sort-by">
									<form id="search_form" action="">

									<select  name="sort3"  id="sort3" class="form-control-sm custom-select">
										<option></option>
<option  value="all" @if(isset($_GET['sort3']) && $_GET['sort3']=="all") selected=""  @endif >All</option>
<option value="Pending" @if(isset($_GET['sort3']) && $_GET['sort3']=="Pending")  selected=""  @endif >Pending</option>
<option value="Inprogress" @if(isset($_GET['sort3']) && $_GET['sort3']=="Inprogress") selected=""  @endif >Inprogress</option>					
<option value="Completed" @if(isset($_GET['sort3']) && $_GET['sort3']=="Completed") selected=""  @endif >Completed</option>
<option value="RejectedByProvider" @if(isset($_GET['sort3']) && $_GET['sort3']=="RejectedByProvider") selected=""  @endif >Rejected</option>

									</select>
								</form>
								</div>
							</div>
						
						</div>
					
					 {{-- {{$bookedservice}}  --}}
					 @if(isset($y) && !empty($y))
					 
						@foreach($y  as $onebook)
						<div class="bookings">
							<div class="booking-list">
                                
								<div class="booking-widget">
									@if(isset($onebook->bookservice->image))
									<a href="{{('/PostsCategories/service/'.$onebook->bookservice->id)}}" class="booking-img">
		<img src="{{asset('uploads/photo/'.$onebook->bookservice->image)}}" alt="User Image">
									</a>
@endif
									<div class="booking-det-info">
										<h3>{{$onebook->service_name}}</h3>
										<ul class="booking-details">	
										{{-- @if(App\booking::where([['id',$onebook->id] ,['status' , 'pending']])->exists()) --}}
										{{-- $bookid={{$onebook->id}} --}}

		@if(App\booking::where([['id',$onebook->id] ,['status' , 'pending']])->exists())
	                                                <li>
												<span>Booking Date</span> {{$onebook->created_at}}<span class="badge badge-pill badge-prof bg-warning">Pending</span>
											</li>
			@elseif(App\booking::where([['id',$onebook->id] ,['status' , 'inprogress']])->exists())
											<li>
												<span>Booking Date</span> {{$onebook->created_at}}<span class="badge badge-pill badge-prof bg-primary">inprogress</span>
											</li>
										@elseif(App\booking::where([['id',$onebook->id] ,['status' , 'completed']])->exists())
											<li>
												<span>Booking Date</span> {{$onebook->created_at}}<span class="badge badge-pill badge-prof bg-success-light">completed</span>
											</li>
										@endif

											{{-- <li><span>Booking time</span> 12:00:00 - 13:00:00</li> --}}
											<li><span> Amount</span>{{$onebook->service_price}}JD </li>
                                            <li><span> Location</span>{{$onebook->service_location}} </li>

							         	<li><span>Provider Phone</span> {{$onebook->provider_phone}}</li>
                                            <li>
								@if(isset($proInfo) && !empty($proInfo))				
										@foreach($proInfo as $information)
												<span>Provider</span>
												<div class="avatar avatar-xs mr-1">
	<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('uploads/photo/'.$information->image)}}"  width="150px" height="150px"  >
												</div>
									
										@endforeach
										@endif
												{{$onebook->provider_name}}
											</li>
											
	
											
										</ul>
									</div>
                                </div>
                               
								<div class="booking-action">

            @if(App\booking::where([['id',$onebook->id] ,['status' , 'inprogress']])->exists()  || App\booking::where([['id',$onebook->id] ,['status' , 'completed']])->exists()    || App\booking::where([['id',$onebook->id] ,['status' , 'RejectedByProvider']])->exists() )
   <a href="{{'accept/'.$onebook->id}}" class="btn btn-sm bg-success-light" data-toggle="modal"  data-target="#deleteNotConfirmModal" style='display:none' > <i class="fas fa-check"></i>  Accept the Service</a>

									<a href="{{'rejecte/'.$onebook->id}}" class="btn btn-sm bg-danger-light"  style='display:none'><i class="fas fa-times"></i> Rejecte the Service</a>

			

									@elseif(App\booking::where([['id',$onebook->id] ,['status' , 'pending']])->exists())
			<a  onclick="{{'acceptfunction('.$onebook->id.')'}}" href="{{'accept/'.$onebook->id}}" class="btn btn-sm bg-success-light" data-toggle="modal"  data-target="#deleteNotConfirmModal"> <i class="fas fa-check"></i>  Accept the Service</a>
                              <a href="{{'rejecte/'.$onebook->id}}" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Rejecte the Service</a>
			

										 @endif
										 
									@if(App\booking::where([['id',$onebook->id] ,['status' , 'RejectedByProvider']])->exists() )
									<p style='color:red' ><i class="fas fa-times"></i>You rejected this service</p>
									   @endif
									   
 {{-- *******************************************************payment form  --}}
								
		 @if(App\booking::where([['id',$onebook->id] ,['status' , 'completed']])->exists() )
			
		 <form action="/ProviderPayment/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"  >
			@csrf
			<div class="row">
				
				<div class="col-lg-6">
					<div class="form-group">
					
	<input type="hidden" class="form-control" type="text"  name="service_price" value="{{$onebook->service_price}}" readonly>
					</div>
				</div>
			
				<div class="col-lg-12">
					<div class="form-group">
						<div class="text-center">
							<div id="load_div"></div>
						</div>
<input type="hidden" class="form-control" rows="5"  name="status"  value="completed"   type="text"  autocomplete="off" >


					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="hidden" id="custId" name="user_id" value="{{$onebook->user_id}}">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<input type="hidden" id="custId" name="provider_id" value="{{Auth::user()->id}}" type="text"  autocomplete="off" >  
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
			<input type="hidden" class="form-control" name="service_id"  value="{{$onebook->service_id}}"  type="text"  autocomplete="off">

				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
	<input type="hidden" class="form-control" name="provider_name"  value='{{$onebook->provider_name}}''  type="text" autocomplete="off">

				</div>
			</div>


	
			<div class="col-lg-6">
				<div class="form-group">
			<input type="hidden" class="form-control" name="service_name"  value="{{$onebook->service_name}}"  type="text"  autocomplete="off">

				</div>
			</div>

			<div class="col-lg-6">
				<div class="form-group">
			<input type="hidden" class="form-control" name="EndService"  value="{{$onebook->id}}"  type="text"  autocomplete="off">

				</div>
			</div>
			<div class="submit-section">
			
@if(App\payment::where([['service_id',$onebook->service_id] ,['EndService' , $onebook->id]])->exists() )
				<button class="btn btn-md bg-success-light" type="submit" style='display:none' >
					<i class="fas fa-check" ></i> The service Ended</button></a>
				
			
				@else
					<button class="btn btn-md bg-success-light" type="submit"  >
						<i class="fas fa-check"></i> The service Ended</button></a>
					@endif
				</div>
		</form>

										  @endif


								</div>
                            </div>
                            
						</div>
						@endforeach
					 </div>
					 
					
@endif
					</div>
				</div>
			</div>
		</div> 
		
        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
						</button>
					</div> 
					<div class="modal-footer">	<a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
						<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="acc_title">Accept Service?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Accept this booking??</p>
					</div>
					<div class="modal-footer">
						@if(isset($onebook) && !empty($onebook))
						<a  id="accept_btn" href="{{'accept/'.$onebook->id}}"><button type="button" class=" btn btn-light bg-success-light si_accept_cancel" >OK</button></a>
						<a  href=""><button type="button" class="btn btn-danger " data-dismiss="modal">Cancel</button>
                        </a>
                       @endif
					</div>
				</div>
			</div>
        </div>﻿ 
      
        @endsection