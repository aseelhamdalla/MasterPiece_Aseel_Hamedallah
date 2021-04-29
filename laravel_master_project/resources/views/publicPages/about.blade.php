@extends('layout.public_main')	
@section('section1')


<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumb-title">
							<h2>About Us</h2>
						</div>
					</div>
					<div class="col-auto float-right ml-auto breadcrumb-menu">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="http://127.0.0.1:8000/landing">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">About Us</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		
		<section class="about-us">
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-6">
							<div class="about-blk-content">
								<h4>Experienced and Reliable</h4>
								<p>wecare.com, is an jordanian company, was founded in 2021 on the 
									understanding that quality family and home care is both a fundamental human
									 need and a key driver of economic growth
									 and empowerment. When we have a strong caregiving workforce,
									  all these things are possible.

									  wecare.com offers of an array of services that enable
 families to find, manage and pay for care and provide 
 employment opportunities for caregivers. These include a 
 robust suite of safety tools and resources, easy ways for 
 caregivers to be paid and obtain professional benefits, 
 household tax and payroll services for families, and customized
  corporate benefits packages covering child care and senior care services. </p>
								<p>The idea came from the current situation that Coronavirus
									 made to our daily life . All families need people to come home to provide
									  services, especially for children.Our company revolves around the
									   creation of a multi-service site that provides home services to homes 
									   with the best quality and confidence. So that it displays all the information
										about the service providers by there accounts ,display the price of each service
										 and site locations . in addition to the ability to evaluate each person who provided
										  a service.</p>				
													</div>
						</div>
						<div class="col-6">
							<div class="about-blk-image">
								<img src="{{asset('public_theme/img/about1.jpg')}}" class="img-fluid" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="call-us">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<span>Free Consultation</span>
						<h2>Ready to start your dream project?</h2>
						<p>Our customers trust us to fix, maintain and look after their home - whether that's plumbing and electrics, painting and cleaning or even child care. If you're a landlord looking to protect your rental property, we can arrange cover for you too!</p>
					</div>
					<div class="col-6 call-us-btn">
						<a href="http://127.0.0.1:8000/contactus" class="btn btn-call-us">Request A Free Consultation</a>
					</div>
				</div>
			</div>
		</section>
		
		<!-- How It Works -->
		<section class="how-work">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading howitworks">
							<h2>Reasons You Should Call Us</h2>
							<span>Our Advantages</span>
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
										<p>Whatever your home needs - you can relax knowing help is just a click or a phone call away.</p>
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
										<p>We’re even here to help if you need any repair,We can provide you with regular work in your area, all year round.</p>
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
@endsection