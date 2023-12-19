<!DOCTYPE html>
<html lang="en">
@php($settings = \App\Models\Setting::first())
@php($pages = \App\Models\Page::get())
@php($uri = explode("/",(substr( $_SERVER['REQUEST_URI'], strpos( $_SERVER['REQUEST_URI'], "/") + 1)),3))
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{$settings->ResDesc()}}">
<meta name="author" content="{{$settings->ResDesc()}}">
    <meta name="csrf-token" content="{{csrf_token()}} ">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title>{{__('menu.'.$uri[0])}}</title>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="{{$settings->icon}}">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="{{$settings->header_logo}}">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="{{$settings->header_logo}}">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="{{$settings->header_logo}}">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="{{$settings->header_logo}}">
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
    <link rel="stylesheet" href="{{url('/admin/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
<!-- General Stylesheet
    ============================================= -->
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link href="{{url('/fonts/fonts.css')}}" rel="stylesheet">
<!-- Main Template Styles -->
<link href="{{url('/stylesheets/main.css')}}" rel="stylesheet">
    <link href="{{url('/admin/assets/css/sweetalert2.min.css')}}" rel="stylesheet">
<!-- Main Template Responsive Styles -->
<link href="{{url('/stylesheets/main-responsive.css')}}" rel="stylesheet">
    <link href="{{url('/admin/assets/css/toastr.min.css')}}" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="{{url('/javascripts/libs/html5shiv.js')}}"></script>
      <script src="{{url('/javascripts/libs/respond.min.js')}}"></script>
    <![endif]-->



       <script src="{{ asset('/js/app.js') }}" defer></script>
    <style>
        .overlay_item img{
            width: initial;
            height: 250px
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
        #orders {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #orders td, #orders th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #orders tr:nth-child(even){background-color: #f2f2f2;}

        #orders tr:hover {background-color: #ddd;}

        #orders th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(102, 83, 255);
            color: white;
        }





        .how_much,
        h3{text-shadow: 0 0 10px rgba(0,0,0,0.3); }


        .btn:hover{box-shadow: 0 2px 10px rgba(0,0,0,0.25)}

        .coupon {
            border-radius: 12px;
            box-shadow: 5px 8px 10px #d6d5d533
        }
        .vl {
            border-left: 4px dashed rgb(102, 83, 255);
            height: 95px;
        }

        div.stars {
            width: 270px;
            display: inline-block
        }


        input.star {
            display: none
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #4A148C;
            transition: all .2s
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952
        }

        input.star-1:checked~label.star:before {
            color: #F62
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3)
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="time"]::-webkit-calendar-picker-indicator{
            filter: invert(1);

        }
        input[type="date"]::-webkit-calendar-picker-indicator{
            filter: invert(1);

        }
        ::selection {
            background: {{$settings->theme_colour}};
            color: #fff
        }
        ::-moz-selection {
            background: {{$settings->theme_colour}};
            color:#fff
        }
        ::-webkit-selection {
            background: {{$settings->theme_colour}};
            color:#fff
        }

        #header-sticky-wrapper.is-sticky #header #main-menu>ul>li.current>a, #header-sticky-wrapper.is-sticky #header #main-menu>ul>li>a:hover, #header-sticky-wrapper.is-sticky #header #shop_cart>a>i:hover {
            color: {{$settings->theme_colour}}
    }
    </style>
    <style>
        @font-face {
            font-family: saleem;
            src: url('{{asset('/fonts/Bahij_TheSansArabic-Bold.ttf')}}');
        }
    </style>
    <style>
        .date-block-dark .date-blocks .block-item{
            border: 2px solid {{$settings->theme_colour}};
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
    <style>
        .interest-in .overlay_content .overlay, .menu_grid .overlay_content .overlay, .menu_list .overlay_content .overlay, .our-menu .overlay_content .overlay{
            height: 35%;
        }
    </style>
<style lang="css">


    .start{
    }


    .swiper1 {
        width: 100%;
    }
    .swiper1 .selected{
        color:#ec5566;
        border-bottom:2px solid #ec5566;
    }
    .swiper1 .swiper-slide {
        text-align: center;
        font-size: 18px;
        height:50px;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        cursor:pointer;
    }

    .swiper2 {
        width: 100%;
        height: 400px!important;
    }
    .swiper2 .swiper-slide{
        height: 400px!important;

        text-align:center;
        padding:80px 0 0 0;
        font-size:25px
    }



    @media screen and (max-width: 2050px) {

        .order_list{
            margin-left: 285px;
        }

    }


    @media screen and (width: 768px)  {
        .my_account_inputs {
            margin-left: 165px;
            width: 60%;
        }
    }

    @media screen and (width: 1024px)  {
        .my_account_inputs {
            margin-left: 225px;
            width: 60%;
        }
    }

    @media screen and (width: 1080px)  {
        .my_account_inputs {
            margin-left: 260px;

        }
        .inputs {
            margin-left: 260px;
            width: 100%;
        }
        .order_list{
            margin-left: 200px;
        }
        .coupon_list{
            margin-left: 200px;
        }
    }

    #shop_cart>a>i{
        color: {{$settings->theme_colour}};
    }


    .custom_widtho{
        width: 455px;
    }


</style>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

</head>
<body style="font-family: 'saleem'" >
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
<!-- Document Wrapper
    ============================================= -->
<div id="wrapper">
  <!-- banner
    ============================================= -->
  <section class="banner dark" >
    <div id="menu-parallax">
      <div class="bcg "
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#menu-parallax"
                style="@if($pages->count() > 0) background-image:url({{$pages[1]->image}})@endif;"
              >
        <div class="bg-transparent">
            <div class="banner-content">
                <div class="container" >
                  <div class="slider-content  "> <i class="fa fa-table"></i>


                      @if( $uri[0] == 'user')
                          <h1 style="color: white" id="breadcrumb_text">Meal Details</h1>
                          @else
                  <h1 style="color: white" id="breadcrumb_text">{{__('menu.'.$uri[0])}}</h1>

                      @endif
                    <p style="color: white">{{__('menu.Your Taste is Our Goal')}}</p>
                    <ol class="breadcrumb">
                      {{-- <li><a href="index01.html">{{$title}}</a></li> --}}
                      {{-- <li>Menu Gird Three Column</li> --}}
                    </ol>
                  </div>
                </div>
              </div>
          {{-- @include('layouts.headerContent') --}}
          <!-- End Banner content -->
        </div>
        <!-- End bg trnsparent -->
      </div>
    </div>
    <!-- Service parallax -->
  </section>
  <!-- End Banner -->
  <!-- Header
    ============================================= -->
  <header id="header" class="header-transparent">
    <div class="container">
      <div class="row">
        <div id="main-menu-trigger"><i class="fa fa-bars"></i></div>
        <!-- Logo

                    ============================================= -->
          <div id="logo"> <a href="/" class="light-logo"><img src="{{$settings->header_logo}}" alt="Logo" style="width: 125px;"></a> <a href="/" class="dark-logo"><img src="{{$settings->logo}}" alt="Logo" style="width: initial;height: 40px;"></a> </div>

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
  <!-- End header -->

  <main class="content" id="app">
   @yield('content')

      <div class="modal" tabindex="-1" role="dialog" id="verification_modal">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">{{__('menu.Mobile Verification Code')}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <h3 class="message"></h3>

                      <span class="mobile-text">{{__('menu.Enter the code we just send on your mobile')}}    </span>

                      <form id="verify_form"  class="content-area">
                          @csrf



{{--                          <p><a href='#'>Need help?</a></p>--}}
                          <fieldset class='number-code'>
                              <legend>{{__('menu.OTP Code')}}</legend>
                              <div >
                                  <input type="hidden" name="generated_code" class="code">
                                  <input type="hidden" name="phone" class="phone">
                                  <input  id="codeBox1" name='code_1' type="number" class='code-input ' maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" required/>
                                  <input  id="codeBox2" name='code_2' type="number" class='code-input'  maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" required/>
                                  <input  id="codeBox3" name='code_3' type="number" class='code-input'  maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" required/>
                                  <input  id="codeBox4" name='code_4' type="number" class='code-input'  maxlength="1"  onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" required/>

                              </div>
                          </fieldset>


                      </form>
{{--                      <p><a href='#'>Resend Code ?</a></p>--}}
                  </div>

                  <div class="modal-footer">
                      <div class="row">
                          <div class="col-md-6">
                              <button type="button"  onclick="verify()" class="btn  btn-block " style="background-color: rgb(102, 83, 255);color: white" >  {{__('menu.Verify')}} </button>
                          </div>

                          <div class="col-md-6">
                              <button type="button"  class="btn btn-secondary btn-block" data-dismiss="modal"> {{__('menu.Close')}}</button>
                          </div>


                      </div>

                  </div>
              </div>
          </div>
      </div>


      <div class="modal" tabindex="-1" role="dialog" id="alert_message">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">ALERT !</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <h3 class="message"></h3>


                  </div>
                  <div class="modal-footer">

                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
  </main>

  @include('layouts.footer')
