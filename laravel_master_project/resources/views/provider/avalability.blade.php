@extends('layout.public_main')	
@section('section1')
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<div class="mb-4">

							<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
								@if(isset(Auth::user()->info->image)  && !empty(Auth::user()->info->image) )

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
						<div class="widget settings-menu">
							<ul>
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
									<a href="/provider_dashboard/booking_list/{{Auth::user()->id}}" class="nav-link">
										<i class="far fa-calendar-check"></i> <span>Bookings List</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="/profile/{{Auth::user()->id}}" class="nav-link">
										<i class="far fa-user"></i> <span>Profile Settings</span>
									</a>
								</li>
						   
								<li class="nav-item">
									<a href="/{{Auth::user()->id}}" class="nav-link active ">
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
						<div class="card mb-0">
							<div class="card-body">
								<form action="/avalableeee/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"  >
									@csrf
									<div class="form-group">
										<p>Availability <span class="text-danger">*</span>
										</p>
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive">
													<table class="table availability-table">
														<tbody>
															<tr>



																{{-- <td class="w-180">
																	Day
																	<span class="time-select mb-1">	</span>
																	
	
			<select class="form-control" name="WeekDays">
																			<option>Select Day</option>
																			<option value="saturday">Saturday</option>
																			<option value="Sunday">Sunday</option>
																			<option value="Monday">Monday</option>
																			<option value="Tusday">Tusday</option>
																			<option value="Wedensday">Wedensday</option>
																			<option value="Thursday">Thursday</option>
																			<option value="Frieday">Friday</option>
															</select>
																</td> --}}


																<td class="w-180">	
													Date
								<span class="time-select mb-1">	</span>
									
						<input type="date" name="day"  class="form-control" >
																
																</td>
														
																<td class="w-180">
																	From 
																	<span class="time-select mb-1">	</span>
																	
		<input name="from"  placeholder="from" type="time" class="form-control" type="text">
																</td>
								
																<td class="w-180">
																	To
																	<span class="time-select mb-1">	</span>
																	
																	<input name="to" type="time" placeholder="to" class="form-control" type="text">
																</td>

																<td>
																	<input type="hidden" id="custId" name="user_id" value="{{Auth::user()->id}}">


																</td>
																<td>
																	<input type="hidden" id="custId" name="status" value="avalable">


																</td>
															</tr>
													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section text-right">
										<button class="btn btn-primary submit-btn" type="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>﻿
			</div>﻿
		
            @endsection