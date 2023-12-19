<!DOCTYPE html>
<html lang="en">
@php($settings = \App\Models\Setting::first())
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{$settings->ResDesc()}}">

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
<meta name="author" content="STEPS !">
    <meta name="csrf-token" content="{{csrf_token()}} ">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requecenter-headersts">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title>{{__('menu.Steps Home')}}</title>
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
    <link rel="stylesheet" href="{{url('/admin/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{url('/admin/assets/css/toastr.min.css')}}" rel="stylesheet">

<style>
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
    #shop_cart>a>i{
        color: {{$settings->theme_colour}};
    }
</style>
    <style>
        @font-face {
            font-family: saleem;
            src: url('{{asset('/fonts/Bahij_TheSansArabic-Bold.ttf')}}');
        }

        @media screen and (max-width: 414px) {
          .block-item{
              padding: initial;
          }
        }
    </style>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MBMG7G9');</script>
    <!-- End Google Tag Manager -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

</head>

<body style="font-family: 'saleem'" >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MBMG7G9"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
  <!-- Video Background Youtube
    ============================================= -->
{{-- <section id="bgndVideo" class="fullheight yt-bg-player player" class="player" data-property="{videoURL:'HAeWL6I25rc',containment:'.fullheight', showControls:true, autoPlay:true, loop:true, vol:50, mute:false, startAt:0,  stopAt:296, opacity:1, addRaster:true, quality:'large', optimizeDisplay:true}" >    <!-- Bg transparent --> --}}
  <section id="" class="fullheight "  >
    <div class="swiper-container swiper-parent fullheight">
      <!-- Slider Wrapper  -->
      <div class="swiper-wrapper">

        <!-- Slide  -->
          @foreach($sliders as $slider)
        <div class="swiper-slide ">
          <div class="slider-content ">

            <h1 data-caption-animate="fadeInUp" style="color:#EDEDED">{{$slider->title()}}</h1>
            <h4 class="text-capitalize " data-caption-animate="fadeInUp" data-caption-delay="300" style="color:#EDEDED">
                {{$slider->desc()}}.</h4>
          </div>
          <div class="video-wrap">
            <video poster="{{url($slider->image)}}" preload="auto" loop autoplay >

            </video>
            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
          </div>
        </div>
      @endforeach
        <!-- End Slide  -->
        <!-- Slide  -->
        {{-- <div class="swiper-slide" style="background-image: url('/img/categories.jpg'); background-position: center top;background-size:cover">
          <div class="slider-content ">

            <h1  data-caption-animate="fadeInUp" class="white">HIGH CLASS PROFESSIONAL SERVICE</h1>
            <h4 class="text-capitalize white" data-caption-animate="fadeInUp" data-caption-delay="300">Hot Restaurant Themes</h4>
          </div>
        </div> --}}
        <!-- End Slide  -->
      </div>
      <!-- End Slider Wrapper  -->
      <div id="slider-arrow-left"><i class="fa fa-angle-left"></i></div>
      <div id="slider-arrow-right"><i class="fa fa-angle-right"></i></div>
      <div id="slide-number">
        <div id="slide-number-current"></div>
        <span>/</span>
        <div id="slide-number-total"></div>
      </div>
    </div>
  {{-- <div class="bg-transparent "> --}}
      <!-- Slider content -->
{{--      <div class="container dark slider-content"> <i class="icon-top-draw"></i>--}}
{{--        <div id="text-transform" class="owl-carousel">--}}
{{--          <div class="item">--}}
{{--            <h1>Premium Restaurant Theme</h1>--}}
{{--          </div>--}}
{{--          <div class="item">--}}
{{--            <h1>KEEP CALM &amp; TASTE OUR FOOD</h1>--}}
{{--          </div>--}}
{{--          <div class="item">--}}
{{--            <h1>Premium Restaurant Themes</h1>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <p class="text-capitalize">We Create Delicous Memories</p>--}}
{{--        <i class="icon-bottom-draw"></i> </div>--}}
      <!-- End Slider content -->

    <!-- End Bg transparent -->
  </section>
  <!-- End Video background Youtube -->
  <!-- Header Center
    ============================================= -->
  <header id="header" class="center-header">
    <div class="container" style="height: 0px">
      <div class="row">
        <div id="main-menu-trigger" style="color: azure"><i class="fa fa-bars"></i></div>
        <!-- Logo
                    ============================================= -->
        <div id="logo"> <a href="/" class="light-logo"><img src="{{$settings->header_logo}}" alt="Logo" style="width: 125px;margin-top: 35px;"></a> <a href="/" class="dark-logo"><img src="{{$settings->logo}}" alt="Logo" style="width: initial;height: 40px;"></a> </div>
        <!-- #logo end -->
        <!-- Primary Navigation
                    ============================================= -->
                    <nav id="main-menu" class=" menu-center">
     @include('layouts.menu')
                    </nav>
        <!-- #main-menu end -->
      </div>
    </div>
  </header>
  <!-- End header -->
  <!-- Document Content
    ============================================= -->


        <main class="py-4" id="app">
            @yield('content')
        </main>

  @include('layouts.footer')
