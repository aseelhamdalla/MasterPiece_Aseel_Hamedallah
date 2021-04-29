<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>we care</title>

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


		<div class="login-page ">
			<div class="login-body container ">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="index.html">
									<img src="{{asset('public_theme/img/logobig.png')}}" alt="" class="img-fluid">
								</a>
							</div>
						</div>
					
						<div class="login-header">
							<h3>Login <span>wecare</span></h3>
							<p class="text-muted">Access to our dashboard</p>
						</div>
					
						@if(Session::has('flash_message_error'))
						<div class="alert alert-danger" role="alert">
							{!!session('flash_message_error')!!}
						  </div>
					
						@endif
					  <form method="POST" action="{{ route('login') }}">
                        @csrf

							<div class="form-group">
								<label class="control-label">Email </label>
                                <input class="form-control"  
                                placeholder="Enter your email"  
                                id="email" type="email" class="form-control
                                @error('email') is-invalid @enderror" name="email" 
                                value="{{ old('email') }}" 
                                required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Password</label>
                                <input class="form-control" type="password" 
                                id="password" 
                                 class="form-control @error('password') 
                                 is-invalid @enderror" name="password"
                                  required autocomplete="current-password"
                                 placeholder="Enter your password">

                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong> 
								 </span>	

                             @enderror

							</div>
							<div class="form-group mb-4">

								<div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
						
							<div class="text-center">
                                <button type="submit" class="btn btn-primary  btn-block account-btn"   type="submit">
                                    {{ __('Login') }}
                                </button>
                
							</div>


						<div class=" dont-have mt-4">Don’t have an account? <a href="http://127.0.0.1:8000/register">Register</a>
						</div>
						</form>
						<div><a class="btn btn-link" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
						</a></div>
					</div>

				</div>
			
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{asset('public_theme/js/jquery-3.5.0.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('public_theme/js/popper.min.js')}}"></script>
	<script src="{{asset('public_theme/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset('public_theme/js/admin.js')}}"></script>

</body>

</html>