<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <meta name="enable-email" datasrc="{{$enable_email}}">
    <meta name="sign-up-post" datasrc="{{$signup_post}}">
    <meta name="login-route" datasrc="{{route('show-login')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .unfocus{
            outline: none;
            border: none;
        }
        .unfocus:focus{
            border: none;
            outline: none;
        }
    </style>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/login-plugin/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/login-plugin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/login-plugin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/login-plugin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/login-plugin/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/login-plugin/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-plugin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vquery/kh.vquery.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vquery/css/fontawesome.css')}}">



    <!--===============================================================================================-->
</head>
<body>
</div>
<div class="limiter">
    <div class="container-login100 register-app">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            {{--	<form class="login100-form validate-form">--}}
            <span class="login100-form-title p-b-33">
						Account Sign Up
					</span>
            <div class="row p-0 m-0">
                <div class="col-lg-6 p-0">
                    <div class="wrap-input100 validate-input" id="email_message">
                        <input class="input100 first_name" type="text"  placeholder="First Name">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="wrap-input100 validate-input" id="email_message" style="border-left: 0px;">
                        <input class="input100 last_name" type="text" name="email" placeholder="Last Name">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                </div>

            </div>
            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                <input class="input100 email" type="email" name="pass" placeholder="Email">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
            </div>
            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required" id="pass_message">
                <input class="input100 password" type="password" name="pass" placeholder="Password">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
            </div>
            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                <input class="input100 confirm_password" type="password" name="pass" placeholder="Confirm Password">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required" id="pass_message">
                <select name="" id="" class="input100 unfocus gender" style="padding: 5px 10px">
                    <option value="">Please Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
            </div>

            <div class="container-login100-form-btn m-t-20">
                <button class="login100-form-btn sign-up-submit" data-action="{{route('singup.post')}}">
                   Sign Up
                </button>
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
<script src="{{asset('assets/vquery/bootstrap-notify.js')}}"></script>
<script src="{{asset('assets/vquery/kh.vquery.js')}}"></script>


</body>
</html>
