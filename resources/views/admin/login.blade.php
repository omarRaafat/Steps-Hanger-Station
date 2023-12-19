<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Electronic Steps Login</title>
    <link href="/assets/img/logos/stepIcon.png" rel="icon">

    <!-- Bootstrap Css -->
    <link href="/assetsAdmin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assetsAdmin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assetsAdmin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">{{__('messages.Welcome Back !')}}</h5>
                                    <p>{{__('messages.Sign in to')}}</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="/assetsAdmin/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="/admin" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="/assetsAdmin/images/logo-light.svg" alt="" class="rounded-circle"
                                            height="34">
                                    </span>
                                </div>
                            </a>

                            <a href="/admin" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle" style="background-color:#fff;">
                                        <img src="/assets/img/logos/stepIcon.png" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{route('admin.login.submit' , app()->getLocale())}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{__('messages.E-mail')}}</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Email">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{__('messages.Password')}}</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password"
                                            aria-label="Password" name="password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                    <label class="form-check-label" for="remember-check">
                                        Remember me
                                    </label>
                                </div> -->

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" style="background-color:#6653ff;" type="submit">{{ __('messages.Log In') }}</button>
                                </div>

                                <!-- <div class="mt-4 text-center">
                                    <h5 class="font-size-14 mb-3">Sign in with</h5>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript::void()"
                                                class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()"
                                                class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()"
                                                class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->

                                <!-- <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i
                                            class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                </div> -->

                            </form>
                        </div>

                    </div>
                </div>
                <!-- <div class="mt-5 text-center">

                    <div>
                        <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary">
                                Signup now </a> </p>
                        <p>©
                            <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by Themesbrand
                        </p>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</div>

<script src="/assetsAdmin/libs/jquery/jquery.min.js"></script>
<script src="/assetsAdmin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assetsAdmin/libs/metismenu/metisMenu.min.js"></script>
<script src="/assetsAdmin/libs/simplebar/simplebar.min.js"></script>
<script src="/assetsAdmin/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="/assetsAdmin/js/app.js"></script>
</body>
</html>
