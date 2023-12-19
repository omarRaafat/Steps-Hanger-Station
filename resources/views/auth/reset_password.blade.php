<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$settings->ResDesc()}}">
<meta name="author" content="creative-wp">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<!-- Your Title Page
    ============================================= -->
<title> | {{__('menu.RESET PASSWORD')}}</title>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="{{url('/img/tap_logo.png')}}">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="{{url('/img/favicon/apple-touch-icon-57x57.png')}}">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="{{url('/img/favicon/apple-touch-icon-114x114.png')}}">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="{{url('/img/favicon/apple-touch-icon-72x72.png')}}">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="{{url('/img/favicon/apple-touch-icon-144x144.png')}}">
<!-- Bootstrap Links
     ============================================= -->
<!-- Bootstrap CSS  -->
<link href="{{url('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Plugins
     ============================================= -->
<!-- Owl Carousal -->
<link rel="stylesheet" href="{{url('/stylesheets/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('/stylesheets/owl.theme.css')}}">
<!-- Animate -->
<link rel="stylesheet" href="{{url('/stylesheets/animate.css')}}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{url('/stylesheets/jquery.datetimepicker.css')}}">
<!-- Pretty Photo -->
<link rel="stylesheet" href="{{url('/stylesheets/prettyPhoto.css')}}">
<!-- Font awsome icons -->
<link rel="stylesheet" href="{{url('/stylesheets/font-awesome.min.css')}}">
<!-- General Stylesheet
    ============================================= -->
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link href="{{url('/fonts/fonts.css')}}" rel="stylesheet">
<!-- Main Template Styles -->
<link href="{{url('/stylesheets/main.css')}}" rel="stylesheet">
<!-- Main Template Responsive Styles -->
<link href="{{url('/stylesheets/main-responsive.css')}}" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="{{url('/javascripts/libs/html5shiv.js')}}"></script>
      <script src="{{url('/javascripts/libs/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        @font-face {
            font-family: bahiji;
            src: url('{{asset('/fonts/Bahij_TheSansArabic-Bold.ttf')}}');
        }
    </style>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body style="font-family: 'bahiji'">
<!-- Loader
    ============================================= -->
<div id="loader2">
    <div class="loader-item"> <img src="{{$settings->logo}}" alt="" style="width:225px">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1" style="background-color:{{$settings->theme_colour}}"></div>
            <div class="sk-rect2" style="background-color:{{$settings->theme_colour}}"></div>
            <div class="sk-rect3" style="background-color:{{$settings->theme_colour}}"></div>
            <div class="sk-rect4" style="background-color:{{$settings->theme_colour}}"></div>
            <div class="sk-rect5"  style="background-color:{{$settings->theme_colour}}"></div>
        </div>
    </div>
</div>
<!-- End Loader -->
<!-- Document Wrapper
    ============================================= -->
<div id="wrapper">
  <!-- Full Background BG
        ============================================= -->
  <section class="login-full dark clearfix" >
    <!-- Bg Full Bg -->
    <div class="fullheight full-bg " style="@if($pages->count() > 0) background-image:url({{$pages[1]->image}})@endif;">
      <div class="bg-transparent">
        <!-- Slider content -->
        <div class="slider-content">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <span style="color: black">{{session()->get('message')}}</span>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <span style="color: black">{{session()->get('error')}}</span>
                </div>
            @endif

            <h1 style="color: white">{{__('menu.RESET PASSWORD')}}</h1>
{{--          <span class="welcome ">{{__('menu.enter your to continue')}}</span>--}}
          <div class="form-group padding-50">
            <form action="{{route('userPasswordReset2')}}"  method="POST">
                @csrf
{{--                <input id="phone_hidden" type="text" name="phone" value="{{\Illuminate\Support\Facades\Session::get('phone')}}" class="form-control" placeholder="50xxxxxxx" style="padding-right: 135px;color: white;" required><br>--}}
                <input type="password" name="new_password" id="password_register" class="form-control" style="color: white" placeholder="{{__('menu.PASSWORD *')}}" required>
                <input type="password" name="conf_password" id="password_confirm_register" style="color: white" class="form-control" placeholder="{{__('menu.CONFIRM PASSWORD *')}}" required>

              <input type="submit" class="btn form-control "  style="background-color:{{$settings->theme_colour}};color: white;margin-left: 2px" value="{{__('menu.RESET PASSWORD')}}"/>
            </form>
          </div>


        </div>
        <!-- End Slider content -->
      </div>
      <!-- End Bg Transparent -->
    </div>
    <!-- End Full Bg -->
  </section>
  <!-- End Full Screen BG -->
  <!-- Header Sticky One page
    ============================================= -->
  <header id="header" class="header-transparent">
    <div class="container">
      <div class="row">
        <div id="main-menu-trigger"><i class="fa fa-bars"></i></div>
        <!-- Logo
                    ============================================= -->
          <div id="logo"> <a href="/" class="light-logo"><img src="{{$settings->header_logo}}" alt="Logo" style="height:50px"></a> <a href="/" class="dark-logo"><img src="{{$settings->header_logo}}" alt="Logo" style="width:125px"></a> </div>
        <!-- #logo end -->
        <!-- Primary Navigation
                    ============================================= -->
        <nav id="main-menu" class="dark">
         @include('layouts.menu')

        </nav>
        <!-- #main-menu end -->
      </div>
    </div>
  </header>
  <!-- End Header Sticky One Page -->
    <script>
        setTimeout(function(){ $(".alert-success").fadeOut(500).hide()} , 5000)
        setTimeout(function (){$(".alert-danger").fadeOut(500).hide() }, 5000)
    </script>
 @include('layouts.footer')
