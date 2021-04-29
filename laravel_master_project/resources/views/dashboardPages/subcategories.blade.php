
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
					<a href="http://127.0.0.1:8000/"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
				</li>
				<li >
					<a href="http://127.0.0.1:8000/Category"><i class="fas fa-layer-group"></i> <span>Categories</span></a>
				</li>
				<li class="active">
					<a href="http://127.0.0.1:8000/subcategories"><i class="fab fa-buffer"></i> <span>Sub Categories</span></a>
				</li>
				<li>
					<a href="/services"><i class="fas fa-bullhorn"></i> <span> Services</span></a>
				</li>
				<li>
					<a href="total-report.html"><i class="far fa-calendar-check"></i> <span> Booking List</span></a>
				</li>
				<li>
					<a href="payment_list.html"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
				</li>
				<li>
					<a href="ratingstype.html"><i class="fas fa-star-half-alt"></i> <span>Rating Type</span></a>
				</li>
				<li>
					<a href="review-reports.html"><i class="fas fa-star"></i> <span>Ratings</span></a>
				</li>
			
				
				<li>
					<a href="service-providers.html"><i class="fas fa-user-tie"></i> <span> Service Providers</span></a>
				</li>
				<li>
					<a href="users.html"><i class="fas fa-user"></i> <span>Users</span></a>
				</li>
				<li>
					<a href="settings.html"><i class="fas fa-cog"></i> <span> Settings</span></a>
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
							<h3 class="page-title">SubCategories</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="card">
					<div class="card-body">
					
						<!-- Form -->
						<form action="/Category/create" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>SubCategory Name</label>
								<input class="form-control" type="text"   name="name">
								<div>{{$errors->first('name')}}</div>
							</div>
							<div class="form-group">
								<label>SubCategory Image</label>
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













{{-- <div class="page-wrapper"> --}}
    <div class="content container-fluid col-12">
    
      
        
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub Category</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Edite</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img class="rounded service-img mr-1" src="assets/img/sub-category/sub-category-01.jpg" alt=""> Bus Service
                                        </td>
                                        <td>Automobile</td>
                                        <td>13 Sep 2020</td>
                                        <td class="text-right">
                                            <a href="edit-subcategory.html" class="btn btn-sm bg-success-light mr-2">
                                                <i class="far fa-edit mr-1"></i>Edit
                                            </a>
                                        </td>
                                    </tr>
                                
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