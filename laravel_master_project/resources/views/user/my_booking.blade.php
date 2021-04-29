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
									<p class="text-muted mb-0">Member Since Apr 2020</p>
								</div>
							</div>
						</div>
                        <div class="widget settings-menu">
                            <ul>
                                <li class="nav-item">
                                    <a href="/user/dashboard/{{Auth::user()->id}}" class="nav-link">
                                        <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                            <li class="nav-item">
                                    <a href="/profile/{{Auth::user()->id}}" class="nav-link">
                                        <i class="far fa-user"></i> <span>Profile Settings</span>
                                    </a>
                                </li>
                         
                                <li class="nav-item">
                                    <a href="/my_booking/{{Auth::user()->id}}" class="nav-link active">
                                        <i class="far fa-calendar-check"></i> <span> My Bookings </span>
                                    </a>
                                </li>
                              
                                <li class="nav-item">
                                    <a href="/ShowUserReviewsDashboard/{{Auth::user()->id}}" class="nav-link">
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
						<div class="row align-items-center mb-4">
							<div class="col">
								<h4 class="widget-title mb-0">My Bookings</h4>
							</div>
							<form id="search_form" action="">
							<div class="col-auto">
								<div class="sort-by">
									<h4 class="filter-title">Sort By</h4>
									<select  name="sort2" id="sort2"  class="form-control-sm custom-select">
										<option  ></option>
<option  value="all" @if(isset($_GET['sort2']) && $_GET['sort2']=="all") selected=""  @endif >All</option>
<option value="Pending" @if(isset($_GET['sort2']) && $_GET['sort2']=="Pending")      selected=""  @endif >Pending</option>
<option value="Inprogress" @if(isset($_GET['sort2']) && $_GET['sort2']=="Inprogress") selected=""  @endif >Inprogress</option>
								
										
							
<option value="Completed" @if(isset($_GET['sort2']) && $_GET['sort2']=="Completed") selected=""  @endif >Completed</option>
									</select>
								</div>
							</div>
						</form>
						</div>
					
                     {{-- {{$bookedservice}}  --}}
						@foreach($y  as $onebook)
					
						<div class="bookings">
							<div class="booking-list">
                                
								<div class="booking-widget">
									@if(isset($onebook->bookservice))
						<a href="{{('/PostsCategories/service/'.$onebook->bookservice->id)}}" class="booking-img">
							@endif
										@if(isset($onebook->bookservice->image))
				<img src="{{asset('uploads/photo/'.$onebook->bookservice->image)}}" alt="User Image">
										@endif

									</a>
									<div class="booking-det-info">
										<h3>{{$onebook->service_name}}</h3>
										<ul class="booking-details">

	@if(App\booking::where([['id',$onebook->id] ,['status' , 'pending']])->exists())
										<li>
											<span>Booking Date</span> {{$onebook->created_at}}<span class="badge badge-pill badge-prof bg-warning">pending</span>
										</li>
@elseif(App\booking::where([['id',$onebook->id] ,['status' , 'inprogress']])->exists())

											<li>
												<span>Booking Date</span> {{$onebook->created_at}}<span class="badge badge-pill badge-prof bg-primary">inprogress</span>
											</li>
@elseif(App\booking::where([['id',$onebook->id] ,['status' , 'completed']])->exists()) 
											<li>
												<span>Booking Date</span> {{$onebook->created_at}}<span class="badge badge-pill badge-prof bg-success-light">completed</span>
											</li>
											@elseif(App\booking::where([['id',$onebook->id] ,['status' , 'RejectedByProvider']])->exists()) 
											<li>
												<span>Booking Date</span> {{$onebook->created_at}}<span class=" badge badge-pill badge badge-dark">Rejected By Provider</span>
											</li>
											@endif
											
										
											{{-- <li><span>Booking time</span> 12:00:00 - 13:00:00</li> --}}
											<li><span> Amount</span>{{$onebook->service_price}} </li>
                                            <li><span> Location</span>{{$onebook->service_location}} </li>

								
                                            <li>
												<span>Provider</span>

												<div class="avatar avatar-xs mr-1">
	@if(isset($providerInfo)  && !empty($providerInfo) )	
	<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('uploads/photo/'.$providerInfo->image)}}"  width="150px" height="150px" >
@else 
<img src="https://static1.squarespace.com/static/
54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
1519987239570/icon.png?format=1500w"  class="avatar-img rounded-circle"  alt="image" width="50px" height="50px">
@endif
												</div>
												{{$onebook->provider_name}}
											</li>
											<li><span>Provider Phone</span> {{$onebook->provider_phone}}</li>
	
											
										</ul>
									</div>
                                </div>
                              
								<div class="booking-action">
									
				@if(App\booking::where([['id',$onebook->id] ,['status' , 'completed']])->exists() ||App\booking::where([['id',$onebook->id] ,['status' , 'RejectedByProvider']])->exists())
										
									<a href="{{'complete/'.$onebook->id}}"  class="btn btn-sm bg-success-light" style='display:none' >
										<i class="fas fa-check"></i>  Request Completed</a>

										<a href="{{'delet/'.$onebook->id}}" class="btn btn-sm bg-danger-light"  style='display:none' ><i class="fas fa-times"></i> Cancel the Service</a>
									@else
									{{-- <a href="#" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> Chat</a> --}}
									<a href="{{'complete/'.$onebook->id}}"  class="btn btn-sm bg-success-light">
										<i class="fas fa-check"></i>  Request Completed</a>



									@if($cancleTime <= 86400) 
									<p style='color:red ; margin-top:2.1rem ;margin-left:5.5rem ;'  ><i class="fas fa-exclamation-triangle" ></i>You can cancel within an  24 hour </p>
									<a href="{{'delet/'.$onebook->id}}" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Cancel the Service</a>

									@else
								<p style='color:red ; margin-top:2.1rem ;margin-left:5.5rem ;display:none ' ><i class="fas fa-exclamation-triangle" ></i>You can cancel within an  24 hour </p>
									<a href="{{'delet/'.$onebook->id}}" class="btn btn-sm bg-danger-light" style='display:none'><i class="fas fa-times"></i> Cancel the Service</a>
									@endif

							
 @endif
								</div>
                            </div>
                           
						</div>
						
						 @endforeach

					 </div>
					
					

					</div>
				</div>
			</div>
		</div> 
   
        @endsection