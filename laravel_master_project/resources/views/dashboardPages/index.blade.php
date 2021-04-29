
        @extends('layout.dashboard_main')
        @section('section1')
            <!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-logo">
				<a href="index.html">
					<img src="assets/img/logo-icon.png" class="img-fluid" alt="">
				</a>
			</div>
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active">
							<a href="http://127.0.0.1:8000/dashboardPages"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
						</li>
						<li >
							<a href="http://127.0.0.1:8000/Category"><i class="fas fa-layer-group"></i> <span>Categories</span></a>
						</li>
				
						<li>
							<a href="http://127.0.0.1:8000/Manage_services"><i class="fas fa-bullhorn"></i> <span> Services</span></a>
						</li>
						<li>
							<a href="http://127.0.0.1:8000/Manage_booking"><i class="far fa-calendar-check"></i> <span> Booking List</span></a>
						</li>
						<li>
							<a href="http://127.0.0.1:8000/Manage_Payment"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
						</li>
				
						<li>
							<a href="http://127.0.0.1:8000/Manage_reviews"><i class="fas fa-star"></i> <span>Ratings</span></a>
						</li>
						
						<li>
							<a href="http://127.0.0.1:8000/Manage_providers"><i class="fas fa-user-tie"></i> <span> Providers</span></a>
						</li>
						<li>
							<a href="http://127.0.0.1:8000/Manage_custmers"><i class="fas fa-user"></i> <span>Users</span></a>
						</li>
						<li>
							<a href="http://127.0.0.1:8000/setting"><i class="fas fa-cog"></i> <span> Settings</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
		<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-12">
							<h3 class="page-title">Welcome Admin!</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="far fa-user"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{$users}}</h3>
										<h6 class="text-muted">Users</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-qrcode"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{$services}}</h3>
										<h6 class="text-muted">Services</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="fas fa-user-shield"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{$providerCount}}</h3>
										<h6 class="text-muted">Providers</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-primary">
										<i class="far fa-credit-card"></i>
									</span>
									<div class="dash-widget-info">
										<h3>{{$custmerCount}}</h3>
										<h6 class="text-muted">Custmers</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
        <div class="row">
					<div class="col-md-6 d-flex">
					
						<!-- Recent Bookings -->
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title">Recent Bookings</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center">
										<thead>
										
											<tr>
												<th>Customer</th>
												<th>Date</th>
												<th>Service</th>
												<th>Status</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
											@foreach($BookingSort as $one )
											<tr>
												<td>    
				 	@if(isset($one->userBook->info) || isset($one->userBook->name) )                             
													<a href="#" class="avatar avatar-sm mr-2">

					<img class="avatar-img rounded-circle"  src="{{asset('uploads/photo/'.$one->userBook->info->image)}}" alt="">
																</a>
																{{$one->userBook->name}}
        
				@else
				<a href="#" class="avatar avatar-sm mr-2">
					<img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
					class="avatar-img rounded-circle" alt="image" width="50px"
					height="50px">
																</a>{{$one->userBook->name}}
  
																@endif
															</td>
												<td class="text-nowrap">{{$one->created_at}}</td>
												<td>{{$one->service_name}}</td>
											    <td>
													@if($one->status == "pending")
													<label class="badge badge-dark">{{$one->status}}</label>
													@elseif($one->status == "completed")
													<label class="badge badge-primary">{{$one->status}}</label>
													@elseif($one->status == "inprogress")
													<label class="badge badge-info">{{$one->status}}</label>
	
											 @endif
												</td>
												<td>
								<div class="font-weight-600">{{$one->service_price}}JD</div>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /Recent Bookings -->
						
					</div>
					<div class="col-md-6 d-flex">
					
						<!-- Payments -->
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title">Payments</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center">
										<thead>
											<tr>
												<th>Date</th>
												<th>User</th>
												<th>Provider</th>
												<th>Service</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($paymentSort as $onePayment)
											<tr>
												<td>{{$onePayment->created_at}}</td>
												<td>
													@if(isset($onePayment->info->image)) 
                                            
                                                    <img class="avatar-xs rounded-circle" src="{{asset('uploads/photo/'.$onePayment->PaymentUser->info->image)}}" alt=""> {{$onePayment->PaymentUser->name}}
                                                    
                                                    @else
                                                    <span class="user-img">
                                                        <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                                            class="avatar-img rounded-circle" alt="image" width="50px"
                                                            height="50px">
                                                    </span>
                                                         {{$onePayment->PaymentUser->name}}
                                                      @endif    
												</td>
												<td>
													<span class="table-avatar">
									@if( !empty($providerInfo) )	
				<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('uploads/photo/'.$providerInfo->image)}}"  width="50px" height="50px" >

													@else 
													{{$providerInfo}}
			<img src="https://static1.squarespace.com/static/
										54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
								1519987239570/icon.png?format=1500w"   alt="User Image"  class="avatar-img rounded-circle"   width="40px" height="40px">
													@endif
								<a href="javascript:void(0);"> {{$onePayment->provider_name}}</a>
													</span>
												</td>
												<td>    @if(isset($onePayment->PaymentService->image))
													<a href="{{('/PostsCategories/service/'.$onePayment->PaymentService->id)}}">
												 <img src="{{asset('uploads/photo/'.$onePayment->PaymentService->image)}}" class="pro-avatar" alt="" width="50px"
												 height="50px">  {{$onePayment->service_name}}
													</a>
												 @endif	</td>
												<td>{{$onePayment->service_price}}JD</td>
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
						<!-- Payments -->
						
					</div>
				</div> 
			</div>
		</div> 
	</div>

	  @endsection