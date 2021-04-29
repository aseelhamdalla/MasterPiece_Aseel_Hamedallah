@extends('layout.public_main')	
@section('section1')
<script>
	    $.snack('success', 'New service has been created successfully');
	</script>

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
									<a href="/services/{{Auth::user()->id}}" class="nav-link active ">
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
									<a href="/avalable/{{Auth::user()->id}}" class="nav-link  ">
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
						<h4 class="widget-title">My Services</h4>
				
						<ul class="nav nav-tabs menu-tabs">
					
						</ul>
					
						<div class="row">
							@if(count($services)== 0)
						
             
							<h6>There is no services yet for you {{Auth::user()->name}}</h6>

						@endif	
				
							@foreach($services as $service)

		

							<div class="col-lg-4 col-md-6">
				
								<div class="service-widget">
									<div class="service-img">
										<a href="{{('/PostsCategories/service/'.$service->id)}}">
											<img src="{{asset('uploads/photo/'.$service->image)}}" alt="image" width="400px" height="150px">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img alt="profile image" src="{{asset('uploads/photo/'.Auth::user()->info->image)}}" class="avatar-lg rounded-circle">
												</a>
												<span class="service-price">{{$service->price}}JD</span>
											</div>
											<div class="cate-list">
				<a class="bg-yellow" value="{{$service->category_id}}">	{{$service->provider_name}}</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<p class="title text-truncate">
										
										</p>
										<p class="title text-truncate">
									{{$service->name}}
	
										</p>
								
				
										<div class="rating">
							
					@if(isset($service->reviewService) && !empty($service->reviewService)  )

							
											@for($star= 1 ;$star <= 5 ; $star++ )
											@if($service->reviewService->avg('rating') >= $star)
											<i class="fas fa-star filled "></i>
											@else
										  <i class="fas fa-star "></i>
										  @endif
											  @endfor
						  
		<span class="d-inline-block average-rating">{{$service->reviewService->avg('rating')}}</span>
										
							
											@endif
										</div>
	                         
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
		<a href="{{'service/'.$service->id}}" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
		<div class="col text-right">
	<a onclick="{{'deletfunction('.$service->id.')'}}" href="{{'delet/'.$service->id}}" class="text-danger"  data-toggle="modal"  data-target="#deleteNotConfirmModal"><i class="far fa-trash-alt"></i> Delete</a>
													</div>
													

												</div>
											</div>
										</div>
									
									</div>
								</div>
							</div>
							@endforeach

							<div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="acc_title">Delete Service?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>This will permanently delete the service</p>
										</div>
										<div class="modal-footer">


					

								@if(empty($service->id)|| !isset($service->id))
						
                 
				<h6>There is no services yet for you {{Auth::user()->name}}</h6>
						
							
					@else
<a id="delete_btn" href="{{'delet/'.$service->id}}"><button type="button" class="btn btn-danger si_accept_cancel" >OK</button></a>

							@endif
										</div>
									</div>
								</div>
							</div>﻿ 
						
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
										<h5 class="modal-title" id="acc_title">Inactive Service?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Service is Booked and Inprogress..</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">OK</button>
									</div>
								</div>
							</div>
						</div>﻿
						
	{{-- <!-- Pagination Links --> 
						 <div class="pagination">
								<ul>
									<li class="active">
										<a href="javascript:void(0);">1</a>
									</li>
									<li>
										<a href="javascript:void(0);">2</a>
									</li>
									<li>
										<a href="javascript:void(0);">3</a>
									</li>
									<li>
										<a href="javascript:void(0);">4</a>
									</li>
									<li class="arrow">
										<a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a>
									</li>
								</ul>
							</div> --}}

						</div>
					</div>
				</div>
			</div>
		
		
		{{-- <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
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
		</div> --}}
		
		
	
        @endsection