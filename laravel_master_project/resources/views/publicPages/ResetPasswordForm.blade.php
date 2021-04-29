
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('theme/css/animate.min.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('theme/css/admin.css')}}">
</head>
<style>
.eye_container{
    display: flex;
}

.fa{
  color:rgb(10, 10, 10);
  font-size:1.5rem;
  margin-top: .5rem;
  margin-left: .5rem;
 
}
</style>

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
							<h3>Reset Password </h3>
							
						</div>
					
						{{-- @if(Session::has('flash_message_error'))
						<div class="alert alert-danger" role="alert">
							{!!session('flash_message_error')!!}
						  </div>
					
						@endif --}}
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
    
                            <input type="hidden" name="token" value="{{ $token }}">
							<div class="form-group">
								<label class="control-label">Email </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="form-group mb-4">
                                <label class="control-label">Password</label>
                                <div class="eye_container">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>


                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                                 </div>
							</div>
                            <div class="form-group mb-4">
                                <label class="control-label">Confirm Password</label>
                                <div class="eye_container">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <i id="pass-status2" class="fa fa-eye" aria-hidden="true" onClick="viewPassword2()"></i>
                            </div>
						
							</div>
							</div>
							<div class="text-center">
                          
                                <button type="submit" class="btn btn-primary btn-block account-btn">
                                    {{ __('Reset Password') }}
                                </button>
                
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
    <script src="{{ asset('public_theme/js/sorting_script.js') }}"></script>
</body>

</html>