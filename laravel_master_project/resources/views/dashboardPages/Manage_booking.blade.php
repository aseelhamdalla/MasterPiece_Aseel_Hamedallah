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
                    <li  class="active">
                        <a href="http://127.0.0.1:8000/Manage_Payment"><i class="far fa-calendar-check"></i> <span> Booking List</span></a>
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
                        <h3 class="page-title">Services</h3>
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
            <form action="#" method="post" id="filter_inputs">
                <div class="card filter-card">
                    <div class="card-body pb-0">
                        <div class="row filter-row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Service</label>
                                    <input class="form-control" type="text">
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
                    </div>
                </div>
            </form>
            <!-- /Search Filter -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                  
												<th>Id</th>
												<th>User</th>
											
                                                <th>Service</th>
                                                <th>Provider</th>
												<th>Amount</th>
												<th>Status</th>
                                                <th>Updated</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                       
    

                                            <td>{{$booking->id}}</td>

               <td>         
                 @if(isset($booking->info->image))                             
                <a href="#" class="avatar avatar-sm mr-2">
<img class="avatar-img rounded-circle"  src="{{asset('uploads/photo/'.$booking->userBook->info->image)}}" alt="">
                            </a>{{$booking->userBook->name}}
                        @else 
                        <a href="#" class="avatar avatar-sm mr-2">
 <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                class="avatar-img rounded-circle" alt="image" width="150px"
                                height="150px">
                            </a>{{$booking->userBook->name}}
                          @endif 
                        
                        </td>

                                            <td>{{$booking->service_name}}</td>
                                            <td>{{$booking->provider_name}}</td>
                                            <td>{{$booking->service_price}}JD</td>
                      

                                            <td>
                                                @if($booking->status == "pending")
                                                <label class="badge badge-dark">{{$booking->status}}</label>
                                                @elseif($booking->status == "completed")
                                                <label class="badge badge-primary">{{$booking->status}}</label>
                                                @elseif($booking->status == "inprogress")
                                                <label class="badge badge-info">{{$booking->status}}</label>

                                         @endif
                                            </td>
                                           
                                      
                      
                                            <td>{{$booking->updated_at}}</td> 
                                            {{-- <td>
                                                <div class="status-toggle">
                                                    <input id="service_1" class="check" type="checkbox">
                                                    <label for="service_1" class="checktoggle">checkbox</label>
                                                </div>
                                            </td> --}}
                                            <td>
                                                <a href={{'Manage_booking/delete/'.$booking->id}} class="btn bg-danger-light ml-1">
                                                    <i class="far fa-trash-alt"></i> delete
                                                </a>
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