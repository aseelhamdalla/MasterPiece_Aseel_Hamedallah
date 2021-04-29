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
									<img src="{{asset('public_theme/img/logo-icon.png')}}" alt="" class="img-fluid">
								</a>
							</div>
						</div>
					
						<div class="login-header">
							<h3>Forgot Your Password ?</h3>
							<p class="text-muted">We get it ,stuff happens. Just enter your Email address below and we'll send you a link to reset your password !

                            </p>
						</div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
				
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

						
							<div class="form-group mb-4">
                            
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							</div>
					
							<div class="text-center">
                                <button type="submit" class="btn btn-primary  btn-block account-btn"   type="submit">
                                  Send Password Reset Link
                                </button>
                
							</div>
                            <div class="text-right mt-3">
                                <a class="forgot-link" href="http://127.0.0.1:8000/login">Already have an account? Login!</a>
                            </div>


							<div class="text-right mt-3">
                                <a class="forgot-link" href="http://127.0.0.1:8000/landing">Back To Home Page</a>
                            </div>
                        </div>
                     
                        
                        </form>
                     
			
                        

                   
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