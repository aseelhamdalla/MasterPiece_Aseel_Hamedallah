<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>We care</title>
	{{-- <link rel="stylesheet" href="https://raw.githubusercontent.com/Script47/Toast/master/dist/toast.min.css
    "> --}}
	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('theme/img/favicon.png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('theme/plugins/bootstrap/css/bootstrap.min.css')}}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/all.min.css')}}">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('theme/css/animate.min.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('theme/css/admin.css')}}">

</head>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
		<div class="header">
			<div class="header-left"> 
				<a href="index.html" class="logo logo-small">
					<img src="{{asset('theme/img/logo-icon.png')}}" alt="Logo" width="30" height="30">
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>
			
			<ul class="nav user-menu">
				<li></li>
				{{-- <!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="far fa-bell"></i>  <span class="badge badge-pill"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Thomas Herzberg have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">15 Sep 2020 10:20 PM</span>
												</p>
											</div>
										</div>
									</a>
								</li> --}}
								{{-- <li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="{{asset('theme/img/provider/provider-02.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Matthew Garcia have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">13 Sep 2020 03:56 AM</span>
												</p>
											</div>
										</div>
									</a>
								</li> --}}
								{{-- <li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="{{asset('theme/img/provider/provider-03.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Yolanda Potter have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">12 Sep 2020 09:25 PM</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('theme/img/provider/provider-04.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Ricardo Flemings have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">11 Sep 2020 06:36 PM</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('theme/img/provider/provider-05.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Maritza Wasson have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">10 Sep 2020 08:42 AM</span>
												</p>
											</div>
										</div>
									</a>
								</li> --}}
								{{-- <li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('theme/img/provider/provider-06.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Marya Ruiz have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">9 Sep 2020 11:01 AM</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('theme/img/provider/provider-07.jpg')}}">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Richard Hughes have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">8 Sep 2020 06:23 AM</span>
												</p>
											</div>
										</div>
									</a>
								</li> --}}
							{{-- </ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="admin-notification.html">View all Notifications</a>
						</div>
					</div>
				</li> --}}
				<!-- /Notifications -->
				
				<!-- User Menu -->
				{{-- @if(Auth::check()) --}}
				{{-- @if(Auth::user()->role == 1) --}}
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="{{asset('theme/img/user.jpg')}}" width="40" alt="Admin">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						{{-- <a class="dropdown-item" href="/landing">Public Page</a> --}}
						<a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>	
				{{-- @endif --}}
				{{-- @endif --}}
				<!-- /User Menu -->
				
			</ul>
		</div>
	
		<!-- /Header -->
		
                
@yield("section1")
@yield("section2")


                <!-- jQuery -->
	<script src="{{asset('theme/js/jquery-3.5.0.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('theme/js/popper.min.js')}}"></script>
	<script src="{{asset('theme/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	{{-- <script src="https://raw.githubusercontent.com/Script47/Toast/master/dist/toast.min.js"></script> --}}

	
	<!-- Datepicker Core JS -->
	<script src="{{asset('theme/js/moment.min.js')}}"></script>
	<script src="{{asset('theme/js/bootstrap-datetimepicker.min.js')}}"></script>

	<!-- Slimscroll JS -->
	<script src="{{asset('theme/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('theme/js/bootstrapValidator.min.js')}}"></script>

	<!-- Datatables JS -->
	<script src="{{asset('theme/plugins/datatables/datatables.min.js')}}"></script> 
	
	
	<!-- Select2 JS -->
	<script src="{{asset('theme/js/select2.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset('theme/js/admin.js')}}"></script>





	

</body>

</html>