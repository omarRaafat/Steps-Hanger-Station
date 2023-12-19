<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$settings->ResDesc()}}">
<meta name="author" content="creative-wp">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<!-- Your Title Page
    ============================================= -->
<title>| {{__('menu.RESET PASSWORD')}}</title>
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
        .intl-tel-input .country-list .flag-box, .intl-tel-input .country-list .country-name{
            color: black;
        }
        .code-input{
            width: 50px;
            height: 55px;
            font-size: 30px;
            font-family: -webkit-body;
            padding: 10px;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
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

            <h3 style="color: white">{{__('menu.RESET PASSWORD')}}</h3>
          <span class="welcome ">{{__('menu.enter phone to continue')}}</span>
          <div class="form-group padding-50">
            <form id="reset_form"  action="{{route('userPasswordReset')}}"  method="POST">
                @csrf
                <input id="phone" type="tel" name="phone"  class="form-control" placeholder="50xxxxxxx" style="padding-right: 135px;color: white" required>

<br><br>
                <span class="text-danger" style="font-size: 20px;
    color: #ff000c;display: none" id="all_required"  >{{__('menu.Please Enter Required Inputs')}}</span>
                <input onclick="userResetPassword()" type="button" id="send_reset" class="btn form-control " style="background-color:{{$settings->theme_colour}};color: white;" value="{{__('menu.RESET PASSWORD')}}"/>
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
    <div class="modal" tabindex="-1" role="dialog" id="user_reset_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">{{__('menu.Mobile Verification Code')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3 class="message" style="color: black"></h3>

                    <span class="mobile-text">{{__('menu.Enter the code we just send on your mobile')}}    </span>

                    <form id="user_verify_form"  class="content-area">
                        @csrf



                        {{--                            <p><a href='#'>Need help?</a></p>--}}
                        <fieldset class='number-code'>
                            <legend>{{__('menu.OTP Code')}}</legend>
                            <div >
                                <input type="text" name="generated_code" class="code">
                                <input type="hidden" name="phone" class="phone">

                                <input  id="codeBox1" name='code_1' type="number" class='code-input ' maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" autofocus autocomplete="off" required/>
                                <input  id="codeBox2" name='code_2' type="number" class='code-input'  maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" autocomplete="off" required/>
                                <input  id="codeBox3" name='code_3' type="number" class='code-input'  maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" autocomplete="off" required/>
                                <input  id="codeBox4" name='code_4' type="number" class='code-input'  maxlength="1"  onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" autocomplete="off" required/>



                            </div>
                        </fieldset>


                    </form>
                    {{--                        <p><a href='#'>Resend Code ?</a></p>--}}
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button"  onclick="userVerify2()" class="btn  btn-block " style="background-color: rgb(102, 83, 255);color: white" >
                                {{__('menu.Verify')}} </button>
                        </div>

                        <div class="col-md-6">
                            <button type="button"  class="btn btn-secondary btn-block black" data-dismiss="modal">
                                {{__('menu.Close')}}</button>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
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
