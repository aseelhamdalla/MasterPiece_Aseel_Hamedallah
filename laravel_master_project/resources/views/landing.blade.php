@extends('layout.public_main')	
@section('section1')
<div class="main-wrapper">
	
	{{-- <!-- Header -->
	<header class="header">
		<nav class="navbar navbar-expand-lg header-nav">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand logo">
					<img src="{{asset('public_theme/img/logonew.png')}}" class="img-fluid" alt="Logo">
				</a>
				<a href="index.php" class="navbar-brand logo-small">
					<img src="{{asset('public_theme/img/logo-icon.png')}}" class="img-fluid" alt="Logo">
				</a>
			</div>
			<div class="main-menu-wrapper">
				<div class="menu-header">
					<a href="index.php" class="menu-logo">
						<img src="{{asset('public_theme/img/logo.png')}}" class="img-fluid" alt="Logo">
					</a>
					<a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
				</div>
				<ul class="main-nav">
					<li>
						<a href="http://127.0.0.1:8000/publicindex">Home</a>
					</li>
					<li>
						<a href="http://127.0.0.1:8000/categories">Categories</a>
					</li>
				
					<li>
						<a href="http://127.0.0.1:8000/about">About Us</a>
					</li>
			
					<li>
					<a href="http://127.0.0.1:8000/contactus">Contact Us</a></li>
		
				
					<li class="has-submenu">
				
					</li>
				</ul>
			</div>
			
			<ul class="nav header-navbar-rht">
                <li class="nav-item">
					<a class="nav-link header-login" href="http://127.0.0.1:8000/register"  data-target="">register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link header-login" href="{{ route('login') }}"  data-target="">Login</a>
				</li>
			</ul>
		</nav>
	</header>
	<!-- /Header --> --}}

		<!-- Hero Section -->
		<section class="hero-section">
			<div class="layer">
				<div class="home-banner"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="section-search">
								<h3>Find Trusted  <span>Servicegivers</span> For your every need </h3>
								<p>To get started, choose an option:</p>
								<div class="search-box">
									<form action="search_service" method="POST"   > 
										@csrf
										<div class="search-input line">
											<i class="fas fa-tv bficon"></i>
											<div class="form-group mb-0">
												<input type="text" name="name" class="form-control" placeholder="What are you looking for?">
											</div>
										</div>
										<div class="search-input">
											<i class="fas fa-location-arrow bficon"></i>
											<div class="form-group mb-0">
												<input type="text"   name="location" class="form-control" placeholder="Your Location"> 
												<a class="current-loc-icon current_location" href="javascript:getGeoLocation();"><i class="fas fa-crosshairs"></i></a>
											</div>
										</div>
										<div class="search-btn">
											<button class="btn search_service" type="submit">Search</button>
										</div>
									</form>
								</div>
								<div class="search-cat">
									<a href="http://127.0.0.1:8000/PostsCategories/3">Child Care</a>
								
									<a href="http://127.0.0.1:8000/PostsCategories/6">Electrical  Works</a>
									<a href="http://127.0.0.1:8000/PostsCategories/2">Cleaning
									</a>
								
									<a href="http://127.0.0.1:8000/PostsCategories/5">Plumping</a>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Hero Section -->
		



		<!-- Category Section -->
		<section class="category-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-6">
								<div class="heading">
									<h2>Featured Categories</h2>
									<span>What do you need to find?</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="viewall">
									<h4><a href="http://127.0.0.1:8000/categories">View All <i class="fas fa-angle-right"></i></a></h4>
									<span>Featured Categories</span>
								</div>
							</div>
						</div>
						<div class="catsec">
							<div class="row">
		{{-- @for($i=4;$i <= 4; $i--) --}}
		@foreach($categories as $categorie)
		<div class="col-lg-4 col-md-6">
			<a href="PostsCategories/{{$categorie->id}}">
				<div class="cate-widget">
					<img src="{{asset('uploads/photo/'.$categorie->image)}}" alt="image" width="370px" height="246px">
					<div class="cate-title">
						<h3><span><i class="fas fa-circle"></i> {{$categorie->name}}</span></h3>
						{{-- <a href="{{('/categories'.$categorie->name)}}">{{$categorie->name}}</a><br> --}}
						{{-- <a href="PostsCategories/{{$categorie->id}}">View Details</a> --}}

					</div>
					<div class="cate-count ">
						<i class="fas fa-th-large"></i>
						{{count($categorie->service)}}
					</div>
				</div>
		      	</a>
	        	</div>
				@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- /Category Section -->
		
	<!-- Popular Servides -->
	<section class="popular-services">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-md-6">
							<div class="heading">
								<h2>Most Popular Services</h2>
								<span>Explore the greates our services. You won’t be disappointed</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="viewall">
								<h4><a href="categories.html">View All <i class="fas fa-angle-right"></i></a></h4>
								<span>Most Popular</span>
							</div>
						</div>
					</div>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-md-10">
						<div class="row">
							@foreach($services as $s )
							<div class="col-lg-4 col-md-6">
							
								<div class="service-widget">
									<div class="service-img">
										<a href="{{('PostsCategories/service/'.$s->id)}}">
					<img class="img-fluid serv-img" alt="Service Image" src="{{asset('uploads/photo/'.$s->image)}}">
										</a>

										<div class="item-info">
											<div class="service-user">
												@if(!empty($s->ProviderService->info->image))
												<a href="#">
													<img src="{{asset('uploads/photo/'.$s->ProviderService->info->image)}}" alt="">
												</a>	
												@else
									   <a href="#">
								<img src="https://static1.squarespace.com/static/
									54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
													1519987239570/icon.png?format=1500w"  class="avatar-img rounded-circle"  alt="image" width="50px" height="50px">													</a>

												@endif
			  <span class="service-price">{{$s->price}}JD</span>
											</div>
											<div class="cate-list">
			<a class="bg-yellow" href="service-details.html">{{$s->provider_name}}</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title text-truncate">
											{{$s->name}}
										</h3>
									
										<div class="rating">
											@if((round($s->reviewService->avg('rating'))  !== null) && !empty(round($s->reviewService->avg('rating'))))
									@for($star= 1 ;$star <= 5 ; $star++ )
								
									@if(round($s->reviewService->avg('rating')) >= $star)
									<i class="fas fa-star filled "></i>
									@else
								  <i class="fas fa-star "></i>
								  @endif
								  	@endfor
				  
									<span class="d-inline-block average-rating">({{round($s->reviewService->avg('rating'))}})</span>

									@else 
									<i class="fas fa-star "></i>
									<i class="fas fa-star "></i>
									<i class="fas fa-star "></i>
									<i class="fas fa-star "></i>
									<i class="fas fa-star "></i>
									@endif
										</div>
										
								
									</div>
								</div>
							</div>
							
                       @endforeach
							
						</div>
					</div>
				</div>
			</div>
		</div>








					</div>
				</div>
			</div>
		</section>
		<!-- /Popular Servides -->



				
		
		<!-- How It Works -->
		<section class="how-work">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading howitworks">
							<h2>How It Works</h2>
							<span>We've got you and your home covered, no matter what's going on in the world.

							</span>
						</div>
						<div class="howworksec">
							<div class="row">
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">01</div>
											<img src="{{asset('public_theme/img/icon-1.png')}}" alt="">
										</div>
										<h3>Choose What To Do</h3>
										<p>Whatever your home needs - you can relax knowing help is just a click or a phone call away..</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">02</div>
											<img src="{{asset('public_theme/img/icon-2.png')}}" alt="">
										</div>
										<h3>Find What You Want</h3>
										<p>Whether it’s taking care of your plumbing and Cleaning, painting, window treatments or electrics , our Home Experts are ready to get your job done.</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">03</div>
											<img src="{{asset('public_theme/img/icon-3.png')}}" alt="">
										</div>
										<h3>Amazing Places</h3>
										<p> We’re even here to help if you need any repair,We can provide you with regular work in your area, all year round.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /How It Works -->

		
		

	
	<!-- Provider Register Modal -->
	<div class="modal account-modal fade multi-step" id="provider-register" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-header">
						<h3>Join as a Provider</h3>
					</div>
					
					<!-- Register Form -->
					<form action="index.html">
						<div class="form-group form-focus">
							<label class="focus-label">Name</label>
							<input type="text" class="form-control" placeholder="johndoe@exapmle.com">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Mobile Number</label>
							<input type="text" class="form-control" placeholder="986 452 1236">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Create Password</label>
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="text-right">
							<a class="forgot-link" href="#">Already have an account?</a>
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
						<div class="login-or">
							<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="row form-row social-login">
							<div class="col-6">
								<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
							</div>
							<div class="col-6">
								<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
							</div>
						</div>
					</form>
					<!-- /Register Form -->
					
				</div>
			</div>
		</div>
	</div>
	<!-- /Provider Register Modal -->
	
	<!-- User Register Modal -->
	<div class="modal account-modal fade multi-step" id="user-register" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-header">
						<h3>Join as a User</h3>
					</div>
					
					<!-- Register Form -->
					<form action="index.html">
						<div class="form-group form-focus">
							<label class="focus-label">Name</label>
							<input type="text" class="form-control" placeholder="johndoe@exapmle.com">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Mobile Number</label>
							<input type="text" class="form-control" placeholder="986 452 1236">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Create Password</label>
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="text-right">
							<a class="forgot-link" href="#">Already have an account?</a>
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
						<div class="login-or">
							<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="row form-row social-login">
							<div class="col-6">
								<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
							</div>
							<div class="col-6">
								<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
							</div>
						</div>
					</form>
					<!-- /Register Form -->
					
				</div>
			</div>
		</div>
	</div>
	<!-- /User Register Modal -->
	
	<!-- Login Modal -->
	<div class="modal account-modal fade" id="login_modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-header">
						<h3>Login <span>Truelysell</span></h3>
					</div>
					<form action="index.html">
						<div class="form-group form-focus">
							<label class="focus-label">Email</label>
							<input type="email" class="form-control" placeholder="truelysell@example.com">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Password</label>
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="text-right">	
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
						<div class="login-or">	<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="row form-row social-login">
							<div class="col-6">	<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
							</div>
							<div class="col-6">	<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
							</div>
						</div>
						<div class="text-center dont-have">Don’t have an account? <a href="#">Register</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Login Modal -->
    
    
    @endsection

