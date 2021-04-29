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
                    <li>
                        <a href="http://127.0.0.1:8000/dashboardPages"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="/Category"><i class="fas fa-layer-group"></i> <span>Categories</span></a>
                    </li>
                
                    <li>
                        <a href="http://127.0.0.1:8000/Manage_services"><i class="fas fa-bullhorn"></i> <span> Services</span></a>
                    </li>
                    <li>
                        <a href="http://127.0.0.1:8000/Manage_booking"><i class="far fa-calendar-check"></i> <span> Booking List</span></a>
                    </li>
                    <li  class="active">
                        <a href="http://127.0.0.1:8000/Manage_Payment"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
                    </li>
               
                    <li>
                        <a href="http://127.0.0.1:8000/Manage_reviews"><i class="fas fa-star"></i> <span>Ratings</span></a>
                    </li>
             
                    <li>
                        <a href="http://127.0.0.1:8000/Manage_providers"><i class="fas fa-user-tie"></i> <span> Providers</span></a>
                    </li>
                    <li  >
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
						<div class="col">
							<h3 class="page-title">Payments</h3>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form action="#"> 
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Provider</label>
										<select class="form-control select">
											<option>Select Provider</option>
											<option>Thomas Herzberg</option>
											<option>Matthew Garcia</option>
											<option>Yolanda Potter</option>
											<option>Ricardo Flemings</option>
											<option>Maritza Wasson</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control select">
											<option>Select Status</option>
											<option>Pending</option>
											<option>Inprogress</option>
											<option>Completed (Provider)</option>
											<option>Accepted</option>
											<option>Rejected</option>
											<option>Cancelled (Provider)</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>From Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>To Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /Search Filter -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>ID</th>
												<th>Date</th>
												<th>User</th>
												<th>Provider</th>
												<th>Service</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($patyments as $payment)
                               
											<tr>
												<td>{{$payment->id}}</td>
												<td>{{$payment->created_at}}</td>
												<td>
                                                    @if(isset($payment->info->image)) 
                                            
                                                    <img class="avatar-xs rounded-circle" src="{{asset('uploads/photo/'.$payment->PaymentUser->info->image)}}" alt=""> {{$payment->PaymentUser->name}}
                                                    
                                                    @else
                                                    <span class="user-img">
                                                        <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                                            class="avatar-img rounded-circle" alt="image" width="150px"
                                                            height="150px">
                                                    </span>
                                                         {{$payment->PaymentUser->name}}
                                                      @endif    
												</td>
												<td>
													<span class="table-avatar">
														{{-- <a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-02.jpg">
														</a> --}}
									<a href="javascript:void(0);"> {{$payment->provider_name}}</a>
													</span>
												</td>
												<td>     
                                      @if(isset($payment->PaymentService->image))
                                 <a href="{{('/PostsCategories/service/'.$payment->PaymentService->id)}}">
                              <img src="{{asset('uploads/photo/'.$payment->PaymentService->image)}}" class="pro-avatar" alt="" width="50px"
                              height="50px">  {{$payment->service_name}}
                                 </a>
                              @endif	
                            	</td>

												<td>{{$payment->service_price}}JD</td>
												<td>
													<label class="badge badge-dark">{{$payment->status}}</label>
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
	</div>
	
	@endsection