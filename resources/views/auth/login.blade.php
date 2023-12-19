<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="STEPS LOGIN">
<meta name="author" content="creative-wp">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<!-- Your Title Page
    ============================================= -->
<title> | {{__('menu.Login')}}</title>
<!-- Favicon Icons
    ============================================= -->
    <link rel="shortcut icon" href="{{$settings->icon}}">
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
    <style>
        .country {
            color: black;
        }
        input{
            margin: 20px;
        }



        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .code-input{
            font-size: 30px;
            font-family: -webkit-body;
        }
        #shop_cart>a>i{
            color: {{$settings->theme_colour}};
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
          <h1 style="color: white" >{{__('menu.Login')}}</h1>
          <span class="welcome ">{{__('menu.Login to continue')}}</span>
          <div class="form-group padding-50">
              @if(session()->has("message"))
               <div class="alert alert-danger" id="message">
                   <span>{{session()->get('message')}}</span>
               </div>
              @endif
            <form id="login_screen" action="{{route('userLogin')}}"  method="POST">
                @csrf

                <input id="login_phone" type="tel" name="phone" class="form-control" placeholder="50xxxxxxx" style="padding-right: 135px;color: #ffffff" required>
                <span id="valid-msg" style="color: greenyellow" class="hide">Valid</span>
                <span id="error-msg" style="color:red;" class="hide">Invalid number</span>

              <input type="password" id="login_password" name="password" style="margin-left:2px;color: white" class="form-control"  placeholder="{{__('menu.Password')}}" required>
              <input type="submit"  class="btn form-control " style="background-color:{{$settings->theme_colour}};color: white;margin-left: 2px" value="{{__('menu.Login')}}"/>
            </form>
          </div>
            <a href="{{route('userPasswordReset')}}" style="color: white">{{__('menu.RESET PASSWORD')}} </a>
          <div class="forget text-center">
            <p><a href="{{route('userRegister')}}" style="color: white">{{__('menu.Create an account')}} <i class="fa fa-chevron-circle-right"></i></a></p>
{{--            <p><a href="">I've forgotten my password <i class="fa fa-chevron-circle-right"></i></a></p>--}}
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
        <nav id="main-menu" class="">
         @include('layouts.menu')

        </nav>
        <!-- #main-menu end -->
      </div>
    </div>
  </header>
    <script>
        const phoneInputField = document.querySelector("#login_phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            onlyCountries: ['sa'],
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
  <!-- End Header Sticky One Page -->
 @include('layouts.footer')
