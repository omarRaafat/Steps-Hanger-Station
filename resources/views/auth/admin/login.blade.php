<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login </title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('/img/tap_logo.png')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/admin/loginStyles/css/main.css')}}">
    <!--===============================================================================================-->
    <style>
        .field-icon {
            float: right;
            margin-right: 20px;
            margin-top: -35px;
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{url('/admin/loginStyles/images/stepsLogin-01.png')}}" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="{{route('post.admin.login')}}" method="post">
               @csrf
                <h3 class="login100-form-title">
                    Admin Login
                </h3>

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <span>{{session()->get('error')}}</span>
                    </div>
                @endif

                <div class="wrap-input100 validate-input" data-validate = "Please enter user/email">
                    <input class="input100" type="text" name="username_email" placeholder="UserName / Email" autocomplete="off">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" id="password-field" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>


                    <div class="wrap-input100 validate-input container" style="margin-left:12px
;">
                        <input type="checkbox" name="remember_me" value="1" class="form-check-input " id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <input type="submit" value="Login" style="cursor: pointer" class="login100-form-btn"/>




                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="{{route('forgetWizard')}}">
                         Password?
                    </a>
                </div>

                {{--					<div class="text-center p-t-136">--}}
                {{--						<a class="txt2" href="#">--}}
                {{--							Create your Account--}}
                {{--							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>--}}
                {{--						</a>--}}
                {{--					</div>--}}
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="{{url('/admin/loginStyles/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('/admin/loginStyles/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{url('/admin/loginStyles/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('/admin/loginStyles/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{url('/admin/loginStyles/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{url('/admin/loginStyles/js/main.js')}}"></script>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
<script>

    setTimeout(function (){$(".alert-danger").fadeOut(500).hide() }, 3000)
</script>
</body>
</html>
