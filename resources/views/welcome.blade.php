<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="We provide you with a system for receiving internal and external orders for your store with steps change your orders online and increase your customers">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="assets/img/logos/stepIcon.png" rel="shortcut icon">

        <title>Steps</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="assets/css/loaders/loader-pulse.css" rel="stylesheet" type="text/css" media="all" />
        <!-- End loading animation -->
        <link href="assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MBMG7G9');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body style="overflow:auto;font-family:ap;">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MBMG7G9"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <div class="loader">
            <div class="loading-animation"></div>
        </div>
        <div id="app">

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(window).on('load' , function(){
                $('.loader').css('opacity' , 0);
            });
        </script>
        <script src="{{asset('js/app.js')}}"></script>
        <a href="#top" style="background-color:#6653ff;" class="btn rounded-circle btn-back-to-top" data-smooth-scroll data-aos="fade-up" data-aos-offset="2000" data-aos-mirror="true" data-aos-once="false">
      <img src="assets/img/icons/interface/icon-arrow-up.svg" alt="Icon" class="icon bg-white" data-inject-svg>
    </a>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <script type="text/javascript" src="assets/js/aos.js"></script>

    <script type="text/javascript" src="assets/js/clipboard.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.fancybox.min.js"></script>

    <script type="text/javascript" src="assets/js/flatpickr.min.js"></script>

    <script type="text/javascript" src="assets/js/flickity.pkgd.min.js"></script>

    <script type="text/javascript" src="assets/js/ion.rangeSlider.min.js"></script>

    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>

    <script type="text/javascript" src="assets/js/jarallax.min.js"></script>
    <script type="text/javascript" src="assets/js/jarallax-video.min.js"></script>
    <script type="text/javascript" src="assets/js/jarallax-element.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.smartWizard.min.js"></script>

    <script type="text/javascript" src="assets/js/plyr.polyfilled.min.js"></script>

    <script type="text/javascript" src="assets/js/prism.js"></script>

    <script type="text/javascript" src="assets/js/scrollMonitor.js"></script>

    <script type="text/javascript" src="assets/js/smooth-scroll.polyfills.min.js"></script>

    <script type="text/javascript" src="assets/js/svg-injector.umd.production.js"></script>

    <script type="text/javascript" src="assets/js/twitterFetcher_min.js"></script>

    <script type="text/javascript" src="assets/js/typed.min.js"></script>

    <script type="text/javascript" src="assets/js/theme.js"></script>

    </body>
</html>
