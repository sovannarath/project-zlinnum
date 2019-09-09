<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
    <meta name="csrf_token" content="{{csrf_token()}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #loading{
            display: none;
        }
    </style>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('assets/login-plugin/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	

	<link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	<div style="width: 100%;height: 100%;position: fixed;background: rgba(0,0,0,0.35);z-index: 1080" id="loading">
        <img src="{{asset('assets/custom/media/load.svg')}}" alt="" style="margin: 0 auto;display: block;top: 30%;position: relative">
    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
			{{--	<form class="login100-form validate-form">--}}
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" id="email_message">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required" id="pass_message">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    <div class="col-12 mt-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember">
                            <label class="custom-control-label" for="remember">Remember</label>
                        </div>
                    </div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn login-submit" data-action="{{route('login.post')}}">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="{{route('sign-up')}}" class="txt2 hov1">
							Sign up
						</a>
					</div>
			{{--	</form>--}}
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/login-plugin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets/login-plugin/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login-plugin/js/main.js')}}"></script>
	<script src="{{asset('assets/custom/js/login.js')}}"></script>

</body>
</html>
