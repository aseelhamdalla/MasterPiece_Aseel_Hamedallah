@extends('layout.public_main')	
@section('section1')
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<div class="mb-4">

							<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
								@if(!empty(Auth::user()->info->image))

								<img alt="profile image" src="{{asset('uploads/photo/'.Auth::user()->info->image)}}" class="avatar-lg rounded-circle">

								@else 
								<img alt="profile image" src="https://static1.squarespace.com/static/
								54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
								1519987239570/icon.png?format=1500w" width="50px" height="50px" class="avatar-img rounded-circle"  alt="image" width="150px" height="150px">
								@endif
								<div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
									<h6 class="mb-0">{{Auth::user()->name}} </h6>
									<p class="text-muted mb-0">Member Since May 2021</p>
								</div>
						   
							</div>
						</div> 
						<div class="widget settings-menu">
							<ul>
								@if(Auth::user()->role == 2)
								<li class="nav-item">
				<a href="/provider_dashboard/{{Auth::user()->id}}" class="nav-link ">
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
									<a href="../booking_list/{{Auth::user()->id}}" class="nav-link">
										<i class="far fa-calendar-check"></i> <span>Bookings List</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="/profile/{{Auth::user()->id}}" class="nav-link active">
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
						
						@else 

					    <li class="nav-item">
                                    <a href="/dashboard/{{Auth::user()->id}}" class="nav-link">
                                        <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                            <li class="nav-item">
                                    <a href="profile/{{Auth::user()->id}}" class="nav-link active">
                                        <i class="far fa-user"></i> <span>Profile Settings</span>
                                    </a>
                                </li>
                         
                                <li class="nav-item">
                                    <a href="/my_booking/{{Auth::user()->id}}" class="nav-link ">
                                        <i class="far fa-calendar-check"></i> <span> My Bookings </span>
                                    </a>
                                </li>
                              
                                <li class="nav-item">
                                    <a href="/reviews/{{Auth::user()->id}}" class="nav-link">
                                        <i class="far fa-star"></i> <span>Reviews</span>
                                    </a>
                                </li>
							
								@endif
							</ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">

						<form action="/update/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"  >
							@csrf

							<div class="widget">
								<h4 class="widget-title">Profile Settings</h4> 
								<div class="row">
									<div class="col-xl-12">
										<h5 class="form-title">Basic Information</h5>
									</div>
									<div class="form-group col-xl-12">
											<div class="media-body">
												<h5 class="mb-0">{{Auth::user()->name}}</h5>
										
								
											</div>
									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Name</label>
									<input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Email</label>
									<input class="form-control" type="email" value="{{Auth::user()->email}}" readonly>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Upload photo</label>
									<input class="form-control-file"  type="file"  name="image"  value="{{ old('image') }}">
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Mobile Number</label>
									<input  name="phone"  class="form-control no_only" type="text" value="{{ old('phone') }}" >

									<div style="color:red; margin:15px  0 15px 0">{{$errors->first('phone')}}</div>

								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Date of birth</label>
									<input type="date" class="form-control provider_datepicker" name="date_of_birth" autocomplete="off" value="{{ old('date_of_birth') }}" >
									<div style="color:red; margin:15px  0 15px 0">{{$errors->first('date_of_birth')}}</div>

								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">National Number</label>
									<input type="text" class="form-control provider_datepicker" name="nid" autocomplete="off" value="{{ old('nid') }}" >
									<div style="color:red; margin:15px  0 15px 0">{{$errors->first('nid')}}</div>

								</div>


							
								<div class="col-xl-12">
									<h5 class="form-title">Address</h5>
								</div>
								<div class="form-group col-xl-12">
									<label class="mr-sm-2">Address</label>
									<input type="text" class="form-control"  name="address" value="{{ old('address') }}" >
									<div style="color:red; margin:15px  0 15px 0">{{$errors->first('address')}}</div>

								</div>
						
								<div class="form-group col-xl-12">
									<button class="btn btn-primary pl-5 pr-5" type="submit">Update</button>
								</div> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
        @endsection