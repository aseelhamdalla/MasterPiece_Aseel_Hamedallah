
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
                          <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w" class="avatar-img rounded-circle"  alt="image" width="50px" height="50px">
                                            
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
                                    <a href="/booking_list/{{Auth::user()->id}}" class="nav-link">
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
                                    <a href="/ProviderPayment/{{Auth::user()->id}}" class="nav-link active">
                                        <i class="fas fa-hashtag"></i> <span>Payment</span>
                                    </a>
                                </li>
                            </ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Payment History</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th>Service</th>
												<th>Customer</th>
												<th>Date</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($payments as $onePayment)
											<tr>
												<td>
                            @if(isset($onePayment->PaymentService->image))
                            <a href="{{('/PostsCategories/service/'.$onePayment->PaymentService->id)}}">
                                <img src="{{asset('uploads/photo/'.$onePayment->PaymentService->image)}}" class="pro-avatar" alt="">  {{$onePayment->service_name}}
                            </a>
                         @endif		
                                                </td>
                                                
												<td>
                       @if(isset($onePayment->PaymentUser->info->image))                              
<img class="avatar-xs rounded-circle" src="{{asset('uploads/photo/'.$onePayment->PaymentUser->info->image)}}" alt=""> {{$onePayment->PaymentUser->name}}

@else
<span class="user-img">
    <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
        class="avatar-img rounded-circle" alt="image" width="150px"
        height="150px">
</span>
     {{$onePayment->PaymentUser->name}}
  @endif    
                                                </td>
                                                
												<td>{{$onePayment->created_at}}</td>
												<td><strong>{{$onePayment->service_price}}JD</strong></td>
												<td>
										<span class="badge bg-success-light">{{$onePayment->status}}</span>
												</td>
											</tr>
									@endforeach
									
						
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
        @endif
        @endsection