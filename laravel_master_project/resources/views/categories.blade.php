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
				<li class="active">
					<a href="http://127.0.0.1:8000/Category"><i class="fas fa-layer-group"></i> <span>Categories</span></a>
				</li>
		
				<li>
					<a href="http://127.0.0.1:8000/Manage_services"><i class="fas fa-bullhorn"></i> <span> Services</span></a>
				</li>
				<li>
					<a href="http://127.0.0.1:8000/Manage_booking"><i class="far fa-calendar-check"></i> <span> Booking List</span></a>
				</li>
				<li  >
					<a href="http://127.0.0.1:8000/Manage_Payment"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
				</li>
			
				<li>
					<a href="http://127.0.0.1:8000/Manage_reviews"><i class="fas fa-star"></i> <span>Ratings</span></a>
				</li>
		
				<li>
					<a href="http://127.0.0.1:8000/Manage_providers"><i class="fas fa-user-tie"></i> <span>Providers</span></a>
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
		<div class="row">
			<div class="col-xl-8 offset-xl-2">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title"> Category</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="card">
					<div class="card-body">
					
						<!-- Form -->
						<form action="/Category/create" method="post" enctype="multipart/form-data"  >
							@csrf
							<div class="form-group">
								<label>Category Name</label>
								<input class="form-control" type="text"   name="name">
								<div>{{$errors->first('name')}}</div>
							</div>
							<div class="form-group">
								<label>Category Image</label>
								<input class="form-control" type="file"  name="image">
								<div>{{$errors->first('image')}}</div>
							</div>
						
							<div class="mt-4">
								<button class="btn btn-primary" type="submit">Save Changes</button>
							</div>
						</form>
						<!-- /Form -->
						
					</div>
				</div>
			</div>
		</div>
	</div>

<hr>



{{-- <div class="page-wrapper pt-1"> --}}
    <div class="content container-fluid col-12 ">
				<!-- Search Filter -->
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form action="#" method="post">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Category</label>
										<select class="form-control select">
											<option>Select category</option>
											<option>Automobile</option>
											<option>Construction</option>
											<option>Interior</option>
											<option>Cleaning</option>
											<option>Electrical</option>
											<option>Carpentry</option>
											<option>Computer</option>
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
												<th>#</th>
												<th>Category</th>
												<th>Date</th>
												<th >Edite</th>
												<th >Delete</th>
											</tr>
										</thead>
										<tbody>
												<tr>

											@foreach($categories as $categorie )
											<td>{{$categorie->id}}</td>
											<td>{{$categorie->name}}</td>
				
				
										    <td><img src="{{asset("uploads/photo/$categorie->image ")}}" alt="image" width='50px' height='50px'  ></td>
				
										    <td><a href="/Category/{{$categorie->id}}/edit"  class='btn bg-primary-light'>Edit</a></td>
				
				 <td><a href="/Category/{{$categorie->id}}/delete" class='btn bg-danger-light'>  Delete</a></td>
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
</div>
</div>
	@endsection
	


	
