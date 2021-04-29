<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>We care</title>

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
	
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="index.html">
				<img src="{{ asset('public_theme/img/logobig.png') }}" alt="Logo" >
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Register <span>wecare</span></h3>
							<p class="text-muted">Access to our dashboard</p>
						</div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
							<div class="form-group">
								<label class="control-label">Username</label>
                                <input  id="name" 
                                class="form-control 
                                @error('name') is-invalid @enderror" name="name" 
                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                class="form-control" type="text" placeholder="Enter your username">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
                                <input id="email" type="email"
                                class="form-control 
                                @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                class="form-control"  placeholder="Enter your email">

                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
                                <input     id="password" 
                                class="form-control @error('password') is-invalid @enderror" name="password" 
                                required autocomplete="new-password"
                                class="form-control" type="password" placeholder="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="form-group ">
								<label class="control-label">Confirm Password</label>
                                <input id="password-confirm" 
                                type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password"
                                class="form-control" type="password" placeholder="">
							</div>


							<div class="form-group ">
								{{-- <div class="js-form-message"> --}}

                                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} ">
                                        <label for="role" class="control-label">Register as</label>
            
<div class="form-group">
<select name="role" class="form-control"  data-error-class="u-has-error" data-success-class="u-has-success">

<option style="font-size:1rem;font-weight: 400;padding:2rem;margin:3rem" value="2"> provider</option>
<option style="font-size:1rem;font-weight:400;padding:2rem;margin:3rem" value="3"> user</option>

</select>

@if ($errors->has('role'))
<span class="help-block">
    <strong>{{ $errors->first('role') }}</strong>
</span>
@endif
</div>
</div>
</div>

<div class="text-right mb-1">
	<a class="forgot-link" href="http://127.0.0.1:8000/login">Already have an account?</a>
</div>

							<div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block account-btn">
                                    {{ __('Register') }}
                                </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('theme/js/jquery-3.5.0.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('theme/js/popper.min.js')}}"></script>
	<script src="{{asset('theme/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset('theme/js/admin.js')}}"></script>

</body>

</html>