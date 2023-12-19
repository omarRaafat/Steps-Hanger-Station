<!DOCTYPE html>
<html lang="en">
@php($settings = \App\Models\Setting::first())
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{$settings->ResDesc()}}">    <meta name="author" content="STEPS PANEL !">
    <meta name="csrf-token" content="{{csrf_token()}} ">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title id="page_title">STEPS Dashboard</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{url('/admin/vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/admin/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('/admin/vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" href="{{url('/admin/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">
    <!-- Bootstrap core CSS -->
    @if(\Illuminate\Support\Facades\Session::get('local') == 'en')
        <link id="bootstrap_link" href="{{url('/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link id="jquery_link" href="{{url('/admin/assets/css/jquery-ui.min.css')}}}" rel="stylesheet">
        <link id="style_link" href="{{url('/admin/assets/css/style.css')}}" rel="stylesheet">
    @else
        <link id="bootstrap_link" href="{{url('/admin/assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
        <link id="jquery_link" href="{{url('/admin/assets/css/jquery-ui-rtl.min.css')}}" rel="stylesheet">
        <link id="style_link" href="{{url('/admin/assets/css/style-rtl.css')}}" rel="stylesheet">
    @endif
    <!-- jQuery UI -->

    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{url('/admin/assets/css/slick.css')}}" rel="stylesheet">
    <link href="{{url('/admin/assets/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('/admin/assets/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{url('/admin/assets/libs/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">
    <!-- Costic styles -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/img/tap_logo.png')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        @font-face {
            font-family: bahiji;
            src: url('{{asset('/fonts/Bahij_TheSansArabic-Bold.ttf')}}');
        }
    </style>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>



        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('2259a170d7d004f10316', {
            cluster: 'mt1',
            encrypted: true
        });

        var channel = pusher.subscribe('my-channel');

    </script>



</head>
@php($settings = \App\Models\Setting::select('logo')->first())
<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar" id="body_content" style="font-family: 'bahiji';" >
<!-- Preloader -->
<div id="preloader-wrap">
    <div class="loader-item"> <img src="{{$settings->logo}}" width="155px" height="145px" alt="" >
    <div class="spinner spinner-8">
            <div class="ms-circle1 ms-child"></div>
            <div class="ms-circle2 ms-child"></div>
            <div class="ms-circle3 ms-child"></div>
            <div class="ms-circle4 ms-child"></div>
            <div class="ms-circle5 ms-child"></div>
            <div class="ms-circle6 ms-child"></div>
            <div class="ms-circle7 ms-child"></div>
            <div class="ms-circle8 ms-child"></div>
            <div class="ms-circle9 ms-child"></div>
            <div class="ms-circle10 ms-child"></div>
            <div class="ms-circle11 ms-child"></div>
            <div class="ms-circle12 ms-child"></div>
        </div>

    </div>
</div>
<!-- Overlays -->
<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
{{--<div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>--}}
<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center" href="{{url('/admin/dashboard')}}">
            <img src="{{$settings->logo}}" width=55px" height="45px"  alt="logo">
        </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{url("/admin/dashboard")}}"  > <span><i class="fa fa-home"></i>{{__('menu.Dashboard')}} </span>
            </a>

        </li>
        <!-- /Dashboard -->
        <!-- product -->
        <li class="menu-item ">
            <a href="{{url("/admin/dashboard/orders")}}"> <span><i class="fas fa-clipboard-list fs-16"></i>{{__('menu.Orders')}}</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#RESERVATIONS" aria-expanded="false" aria-controls="RESERVATIONS"> <span><i class="fa fa-calendar-alt  fs-16"></i>{{__('menu.Reservations')}} </span>
            </a>
            <ul id="RESERVATIONS" class="collapse" aria-labelledby="RESERVATIONS" data-parent="#side-nav-accordion">
                <li> <a href="{{route('reservations')}}">{{__('menu.Reservations')}}</a>
                </li>

            </ul>
        </li>


        <li class="menu-item">
            <a href="{{route('contacts.index')}}" class="" > <span><i class="fa fa-phone fs-16"></i>{{__('menu.Contacts')}} </span></a>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product"> <span><i class="fa fa-bars fs-16"></i>{{__('menu.Menus')}} </span>
            </a>
            <ul id="product" class="collapse" aria-labelledby="product" data-parent="#side-nav-accordion">
                <li> <a href="{{route('meals.index')}}">{{__('menu.Meals')}}</a></li>
                <li> <a href="{{route('meals.create')}}">{{__('menu.Add New Meal')}}</a></li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#category" aria-expanded="false" aria-controls="category"> <span><i class="fa fa-list fs-16"></i>{{__('menu.Category Menu')}} </span>
            </a>
            <ul id="category" class="collapse" aria-labelledby="category" data-parent="#side-nav-accordion">
                <li> <a href="{{route('category.index')}}">{{__('menu.Category Menu')}}</a></li>
                <li> <a href="{{route('category.create')}}">{{__('menu.Add Category Menu')}}</a></li>
            </ul>
        </li>









        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#branch" aria-expanded="false" aria-controls="branch"> <span><i class="fas fa-code-branch fs-16"></i>{{__('menu.Branches')}} </span>
            </a>
            <ul id="branch" class="collapse" aria-labelledby="branch" data-parent="#side-nav-accordion">
                <li> <a href="{{route('branches.index')}}">{{__('menu.Branches')}}</a>
                </li>
                <li> <a href="{{route('branches.create')}}"> {{__('menu.Add New Branch')}}</a></li>
            </ul>
        </li>


        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#coupon" aria-expanded="false" aria-controls="coupon"> <span><i class="fa fa-gift fs-16"></i>{{__('menu.Coupons')}} </span>
            </a>
            <ul id="coupon" class="collapse" aria-labelledby="coupon" data-parent="#side-nav-accordion">
                <li> <a href="{{route('coupons.index')}}">{{__('menu.Coupons')}}</a></li>
                <li> <a href="{{route('coupons.create')}}">{{__('menu.Add Coupons')}}</a></li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#admin" aria-expanded="false" aria-controls="admin"> <span><i class="fa fa-user fs-16"></i>{{__('menu.Admin')}} </span>
            </a>
            <ul id="admin" class="collapse" aria-labelledby="admin" data-parent="#side-nav-accordion">
                <li> <a href="{{route('admins.index')}}">{{__('menu.Admins')}}</a></li>
                <li> <a href="{{route('admins.create')}}">{{__('menu.Add New Admin')}}</a></li>
            </ul>
        </li>



        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users"> <span><i class="fas fa-user-friends fs-16"></i>{{__('menu.Users')}} </span>
            </a>
            <ul id="users" class="collapse" aria-labelledby="users" data-parent="#side-nav-accordion">
                <li> <a href="{{route('users.index')}}">{{__('menu.Users')}}</a>
                </li>
                <li> <a href="{{route('users.create')}}"> {{__('menu.Add New User')}}</a></li>
            </ul>
        </li>



        <li class="menu-item">
            <a href="{{route('vats.index')}}" class="" > <span><i class="fa fa-percent fs-16"></i>{{__('menu.Vats')}} </span></a>
        </li>


        <li class="menu-item">
            <a href="{{route('loyality.index')}}" > <span><i class="fa fa-archive fs-16"></i>{{__('menu.Loyalities')}} </span></a>
        </li>







        <li class="menu-item">
            <a href="{{route('banks.index')}}" > <span><i class="fas fa-money-bill-wave fs-16"></i>{{__('menu.Bank Info')}} </span></a>
        </li>

        <!-- product end -->
        <!-- orders -->


        <li class="menu-item">
            <a href="{{url("/admin/dashboard/sales")}}"> <span><i class="fa fa-briefcase fs-16"></i>{{__('menu.Sales')}}</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#settings" aria-expanded="false" aria-controls="settings"> <span><i class="fa fa-cog fs-16"></i>{{__('menu.Settings')}} </span>
            </a>
            <ul id="settings" class="collapse" aria-labelledby="settings" data-parent="#side-nav-accordion">
                <li>  <a href="{{route("settings_1")}}"> <span><i class="fa fa-settings fs-16"></i> {{__('menu.GENERAL INFO')}}</span>
                    </a>
                </li>



                <li>  <a href="{{route("settings_2")}}"> <span><i class="fa fa-settings fs-16"></i> {{__('menu.CONTACT INFO')}}</span>
                    </a>
                </li>
                <li>  <a href="{{route("settings_3")}}"> <span><i class="fa fa-settings fs-16"></i> {{__('menu.about')}}</span>
                    </a>
                </li>


            </ul>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#images" aria-expanded="false" aria-controls="images"> <span><i class="fa fa-table fs-16"></i>{{__('menu.Sections')}} </span>
            </a>
            <ul id="images" class="collapse" aria-labelledby="images" data-parent="#side-nav-accordion">
                <li>  <a href="{{route("slider")}}"> <span><i class="fa fa-settings fs-16"></i> {{__('menu.ADS section')}}</span>
                    </a>
                </li>



                <li>  <a href="{{route("section")}}"> <span><i class="fa fa-settings fs-16"></i>  {{__('menu.Section Image')}}</span>
                    </a>
                </li>



                <li>  <a href="{{url("admin/images/section/categories")}}"> <span><i class="fa fa-settings fs-16"></i> {{__('menu.Category Section')}}</span>
                    </a>
                </li>


            </ul>


        </li>



        <li class="menu-item">
            <a href="{{route('invoices.index')}}" > <span><i class="fas fa-file-invoice fs-16"></i>{{__('menu.Invoices')}} </span></a>
        </li>

        <li class="menu-item">
            <a href="#" data-toggle="collapse" data-target="#statistics" aria-expanded="false" aria-controls="statistics"> <span><i class="fa fa-file fs-16"></i>{{__('menu.Reports')}} </span>
            </a>
            <ul id="statistics" class="collapse" aria-labelledby="statistics" data-parent="#side-nav-accordion">
                <li> <a href="{{route('statistics.meals')}}">{{__('menu.Meals')}}</a></li>
                <li> <a href="{{route('statistics.orders')}}">{{__('menu.Orders')}}</a></li>
                <li> <a href="{{route('statistics.users')}}">{{__('menu.Users')}}</a></li>
            </ul>
        </li>

{{--        <!-- sales end  -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="pages/widgets.html"> <span><i class="material-icons fs-16">widgets</i>Widgets</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <!-- Basic UI Elements -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements"> <span><i class="material-icons fs-16">filter_list</i>Basic UI Elements</span>--}}
{{--            </a>--}}
{{--            <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/ui-basic/accordions.html">Accordions</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/alerts.html">Alerts</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/buttons.html">Buttons</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/breadcrumbs.html">Breadcrumbs</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/badges.html">Badges</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/cards.html">Cards</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/progress-bars.html">Progress Bars</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/preloaders.html">Pre-loaders</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/pagination.html">Pagination</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-basic/tabs.html">Tabs</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pagesui-basic/typography.html">Typography</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Basic UI Elements -->--}}
{{--        <!-- Advanced UI Elements -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#advanced-elements" aria-expanded="false" aria-controls="advanced-elements"> <span><i class="material-icons fs-16">code</i>Advanced UI Elements</span>--}}
{{--            </a>--}}
{{--            <ul id="advanced-elements" class="collapse" aria-labelledby="advanced-elements" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/ui-advanced/draggables.html">Draggables</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-advanced/sliders.html">Sliders</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-advanced/modals.html">Modals</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-advanced/rating.html">Rating</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-advanced/tour.html">Tour</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-advanced/cropper.html">Cropper</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/ui-advanced/range-slider.html">Range Slider</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Advanced UI Elements -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="pages/animation.html"> <span><i class="material-icons fs-16">format_paint</i>Animations</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <!-- Form Elements -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#form-elements" aria-expanded="false" aria-controls="form-elements"> <span><i class="material-icons fs-16">input</i>Form Elements</span>--}}
{{--            </a>--}}
{{--            <ul id="form-elements" class="collapse" aria-labelledby="form-elements" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/form/form-elements.html">Form Elements</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/form/form-layout.html">Form Layouts</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/form/form-validation.html">Form Validation</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/form/form-wizard.html">Form Wizard</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Form Elements -->--}}
{{--        <!-- Charts -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#charts" aria-expanded="false" aria-controls="charts"> <span><i class="material-icons fs-16">equalizer</i>Charts</span>--}}
{{--            </a>--}}
{{--            <ul id="charts" class="collapse" aria-labelledby="charts" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/charts/chartjs.html">Chart JS</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/charts/morris-charts.html">Morris Chart</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Charts -->--}}
{{--        <!-- Tables -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#tables" aria-expanded="false" aria-controls="tables"> <span><i class="material-icons fs-16">tune</i>Tables</span>--}}
{{--            </a>--}}
{{--            <ul id="tables" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/tables/basic-tables.html">Basic Tables</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/tables/data-tables.html">Data tables</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Tables -->--}}
{{--        <!-- Popups -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#popups" aria-expanded="false" aria-controls="popups"> <span><i class="material-icons fs-16">message</i>Popups</span>--}}
{{--            </a>--}}
{{--            <ul id="popups" class="collapse" aria-labelledby="popups" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/popups/sweet-alerts.html">Sweet Alerts</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/popups/toast.html">Toast</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Popups -->--}}
{{--        <!-- Icons -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#icons" aria-expanded="false" aria-controls="icons"> <span><i class="material-icons fs-16">border_color</i>Icons</span>--}}
{{--            </a>--}}
{{--            <ul id="icons" class="collapse" aria-labelledby="icons" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/icons/fontawesome.html">Fontawesome</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/icons/flaticons.html">Flaticons</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/icons/materialize.html">Materialize</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Icons -->--}}
{{--        <!-- Maps -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#maps" aria-expanded="false" aria-controls="maps"> <span><i class="material-icons fs-16">map</i>Maps</span>--}}
{{--            </a>--}}
{{--            <ul id="maps" class="collapse" aria-labelledby="maps" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/maps/google-maps.html">Google Maps</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/maps/vector-maps.html">Vector Maps</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Maps -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#bonuspages" aria-expanded="false" aria-controls="bonuspages"> <span><i class="material-icons fs-16">insert_drive_file</i> Bonus Pages</span>--}}
{{--            </a>--}}
{{--            <ul id="bonuspages" class="collapse" aria-labelledby="bonuspages" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/dashboard/web-analytics.html"> Web Analytics </a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/dashboard/project-management.html">Stock Management</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/dashboard/client-management.html">Client Management</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- / bonus Pages -->--}}
{{--        <!-- Pages -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages"> <span><i class="material-icons fs-16">insert_drive_file</i>Pages</span>--}}
{{--            </a>--}}
{{--            <ul id="pages" class="collapse" aria-labelledby="pages" data-parent="#side-nav-accordion">--}}
{{--                <li class="menu-item"> <a href="#" class="has-chevron" data-toggle="collapse" data-target="#authentication" aria-expanded="false" aria-controls="authentication">Authentication</a>--}}
{{--                    <ul id="authentication" class="collapse" aria-labelledby="authentication" data-parent="#pages">--}}
{{--                        <li> <a href="pages/prebuilt-pages/default-login.html">Default Login</a>--}}
{{--                        </li>--}}
{{--                        <li> <a href="pages/prebuilt-pages/modal-login.html">Modal Login</a>--}}
{{--                        </li>--}}
{{--                        <li> <a href="pages/prebuilt-pages/default-register.html">Default Registration</a>--}}
{{--                        </li>--}}
{{--                        <li> <a href="pages/prebuilt-pages/modal-register.html">Modal Registration</a>--}}
{{--                        </li>--}}
{{--                        <li> <a href="pages/prebuilt-pages/lock-screen.html">Lock Screen</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/prebuilt-pages/coming-soon.html">Coming Soon</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/prebuilt-pages/error.html">Error Page</a>--}}
{{--                </li>--}}
{{--                <li class="menu-item"> <a href="pages/prebuilt-pages/faq.html"> FAQ </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item"> <a href="pages/prebuilt-pages/portfolio.html"> Portfolio </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item"> <a href="pages/prebuilt-pages/user-profile.html"> User Profile </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item"> <a href="pages/prebuilt-pages/invoice.html"> Invoice </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Pages -->--}}
{{--        <!-- Apps -->--}}
{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#apps" aria-expanded="false" aria-controls="apps"> <span><i class="material-icons fs-16">phone_iphone</i>Apps</span>--}}
{{--            </a>--}}
{{--            <ul id="apps" class="collapse" aria-labelledby="apps" data-parent="#side-nav-accordion">--}}
{{--                <li> <a href="pages/apps/chat.html">Chat</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/apps/email.html">Email</a>--}}
{{--                </li>--}}
{{--                <li> <a href="pages/apps/to-do-list.html">To-do List</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <!-- /Apps -->--}}
    </ul>
</aside>
{{--<!-- Sidebar Right -->--}}
{{--<aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">--}}
{{--    <div class="ms-aside-header">--}}
{{--        <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">--}}
{{--            <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active" role="tab" data-toggle="tab"> Activity Log</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity" data-toggle="slideRight"><span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="ms-aside-body">--}}
{{--        <div class="tab-content">--}}
{{--            <div role="tabpanel" class="tab-pane active fade show" id="activityLog">--}}
{{--                <ul class="ms-activity-log">--}}
{{--                    <li>--}}
{{--                        <div class="ms-btn-icon btn-pill icon btn-light"> <i class="flaticon-gear"></i>--}}
{{--                        </div>--}}
{{--                        <h6>Update 1.0.0 Pushed</h6>--}}
{{--                        <span> <i class="material-icons">event</i>1 January, 2019</span>--}}
{{--                        <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="ms-btn-icon btn-pill icon btn-success"> <i class="flaticon-tick-inside-circle"></i>--}}
{{--                        </div>--}}
{{--                        <h6>Profile Updated</h6>--}}
{{--                        <span> <i class="material-icons">event</i>4 March, 2018</span>--}}
{{--                        <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="ms-btn-icon btn-pill icon btn-warning"> <i class="flaticon-alert-1"></i>--}}
{{--                        </div>--}}
{{--                        <h6>Your payment is due</h6>--}}
{{--                        <span> <i class="material-icons">event</i>1 January, 2019</span>--}}
{{--                        <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="ms-btn-icon btn-pill icon btn-danger"> <i class="flaticon-alert"></i>--}}
{{--                        </div>--}}
{{--                        <h6>Database Error</h6>--}}
{{--                        <span> <i class="material-icons">event</i>4 March, 2018</span>--}}
{{--                        <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="ms-btn-icon btn-pill icon btn-info"> <i class="flaticon-information"></i>--}}
{{--                        </div>--}}
{{--                        <h6>Checkout what's Trending</h6>--}}
{{--                        <span> <i class="material-icons">event</i>1 January, 2019</span>--}}
{{--                        <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="ms-btn-icon btn-pill icon btn-secondary"> <i class="flaticon-diamond"></i>--}}
{{--                        </div>--}}
{{--                        <h6>Your Dashboard is ready</h6>--}}
{{--                        <span> <i class="material-icons">event</i>4 March, 2018</span>--}}
{{--                        <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>--}}
{{--                    </li>--}}
{{--                </ul> <a href="#" class="btn btn-primary d-block"> View All </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</aside>--}}
<main class="body-content" id="" style="font-family: 'bahiji';">
    <!-- Navigation Bar -->
<nav class="navbar ms-navbar">

    <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
    </div>
    <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="{{{url('/admin')}}}index.html">
            <img src="{{$settings->logo}}" alt="logo">
        </a>
    </div>
    <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">

{{--        <li class="ms-nav-item dropdown"> <a href="#" class="text-disabled ms-has-notification" id="mailDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-mail"></i></a>--}}
{{--            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown">--}}
{{--                <li class="dropdown-menu-header">--}}
{{--                    <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Mail</span></h6><span class="badge badge-pill badge-success">3 New</span>--}}
{{--                </li>--}}
{{--                <li class="dropdown-divider"></li>--}}
{{--                <li class="ms-scrollable ms-dropdown-list">--}}
{{--                    <a class="media p-2" href="#">--}}
{{--                        <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">--}}
{{--                            <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">--}}
{{--                        </div>--}}
{{--                        <div class="media-body"> <span>Hey man, looking forward to your new project.</span>--}}
{{--                            <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a class="media p-2" href="#">--}}
{{--                        <div class="ms-chat-status ms-status-online ms-chat-img mr-2 align-self-center">--}}
{{--                            <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">--}}
{{--                        </div>--}}
{{--                        <div class="media-body"> <span>Dear John, I was told you bought Costic! Send me your feedback</span>--}}
{{--                            <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 28 minutes ago</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a class="media p-2" href="#">--}}
{{--                        <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">--}}
{{--                            <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">--}}
{{--                        </div>--}}
{{--                        <div class="media-body"> <span>How many people are we inviting to the dashboard?</span>--}}
{{--                            <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 6 hours ago</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="dropdown-divider"></li>--}}
{{--                <li class="dropdown-menu-footer text-center"> <a href="{{url("pages/apps/email.html")}}">Go to Inbox</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        <li class="ms-nav-item dropdown"> <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-count="0" class="flaticon-bell"></i> </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                <li class="dropdown-menu-header">
                    <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info notif-count">0 </span>
                </li>
                <li class="dropdown-divider"></li>
                <li class="ms-scrollable ms-dropdown-list">



                </li>
{{--                <li class="dropdown-divider"></li>--}}
{{--                <li class="dropdown-menu-footer text-center"> <a href="#">View all Notifications</a>--}}
                </li>
            </ul>
        </li>

        <li class="ms-nav-item ms-nav-user dropdown">
            <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa  fa-user-circle fa-2x"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                <li class="dropdown-menu-header">
                    <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, EighttyThree</span></h6>
                </li>
                <li class="dropdown-divider"></li>
                <li class="ms-dropdown-list">
                    <a class="media fs-14 p-2" href="{{route('admins.index')}}"> <span><i class="flaticon-user mr-2"></i> Profile</span>
                    </a>

                </li>

                <li class="ms-dropdown-list">
                    <a id="clickLangeFunction" class="media fs-14 p-2" onclick="switchView('ar')"> <span  style="cursor: pointer"><i class="fa fa-language mr-2"></i> <span id="lang">ARABIC</span></span>
                    </a>
                </li>
                <li class="dropdown-divider"></li>

                <li class="dropdown-menu-footer">

                    <a class="media fs-14 p-2" href="{{route('adminLogout')}}"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span>

                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
    </div>
</nav>

@yield('content')
</main>
<!-- MODALS -->
{{--<aside id="ms-quick-bar" class="ms-quick-bar fixed ms-d-block-lg">--}}

{{--    <ul class="nav nav-tabs ms-quick-bar-list" role="tablist">--}}

{{--        <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch To-do-list" data-title="To-do-list">--}}
{{--            <a href="#qa-toDo" aria-controls="qa-toDo" role="tab" data-toggle="tab">--}}
{{--                <i class="flaticon-list"></i>--}}

{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch Reminders" data-title="Reminders">--}}
{{--            <a href="#qa-reminder" aria-controls="qa-reminder" role="tab" data-toggle="tab">--}}
{{--                <i class="flaticon-bell"></i>--}}

{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch Notes" data-title="Notes">--}}
{{--            <a href="#qa-notes" aria-controls="qa-notes" role="tab" data-toggle="tab">--}}
{{--                <i class="flaticon-pencil"></i>--}}

{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Invite Members" data-title="Invite Members">--}}
{{--            <a href="#qa-invite" aria-controls="qa-invite" role="tab" data-toggle="tab">--}}
{{--                <i class="flaticon-share-1"></i>--}}

{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Settings" data-title="Settings">--}}
{{--            <a href="#qa-settings" aria-controls="qa-settings" role="tab" data-toggle="tab">--}}
{{--                <i class="flaticon-gear"></i>--}}

{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <div class="ms-configure-qa" data-toggle="tooltip" data-placement="left" title="Configure Quick Access">--}}

{{--        <a href="#">--}}
{{--            <i class="flaticon-hammer"></i>--}}

{{--        </a>--}}

{{--    </div>--}}


{{--    <!-- Quick bar Content -->--}}
{{--    <div class="ms-quick-bar-content">--}}

{{--        <div class="ms-quick-bar-header clearfix">--}}
{{--            <h5 class="ms-quick-bar-title float-left">Title</h5>--}}
{{--            <button type="button" class="close ms-toggler" data-target="#ms-quick-bar" data-toggle="hideQuickBar" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
{{--        </div>--}}

{{--        <div class="ms-quick-bar-body tab-content">--}}



{{--            <div role="tabpanel" class="tab-pane" id="qa-toDo">--}}
{{--                <div class="ms-quickbar-container ms-todo-list-container ms-scrollable">--}}

{{--                    <form class="ms-add-task-block">--}}
{{--                        <div class="form-group mx-3 mt-0  fs-14 clearfix">--}}
{{--                            <input type="text" class="form-control fs-14 float-left" id="task-block" name="todo-block" placeholder="Add Task Block" value="">--}}
{{--                            <button type="submit" class="ms-btn-icon bg-primary float-right"><i class="material-icons text-disabled">add</i></button>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                    <ul class="ms-todo-list">--}}
{{--                        <li class="ms-card ms-qa-card ms-deletable">--}}

{{--                            <div class="ms-card-header clearfix">--}}
{{--                                <h6 class="ms-card-title">Task Block Title</h6>--}}
{{--                                <button data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-add-task-to-block ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>--}}
{{--                            </div>--}}

{{--                            <div class="ms-card-body">--}}
{{--                                <ul class="ms-list ms-task-block">--}}
{{--                                    <li class="ms-list-item ms-to-do-task ms-deletable">--}}
{{--                                        <label class="ms-checkbox-wrap ms-todo-complete">--}}
{{--                                            <input type="checkbox" value="">--}}
{{--                                            <i class="ms-checkbox-check"></i>--}}
{{--                                        </label>--}}
{{--                                        <span> Task to do </span>--}}
{{--                                        <button type="submit" class="close"><i class="flaticon-trash ms-delete-trigger"> </i></button>--}}
{{--                                    </li>--}}
{{--                                    <li class="ms-list-item ms-to-do-task ms-deletable">--}}
{{--                                        <label class="ms-checkbox-wrap ms-todo-complete">--}}
{{--                                            <input type="checkbox" value="">--}}
{{--                                            <i class="ms-checkbox-check"></i>--}}
{{--                                        </label>--}}
{{--                                        <span>Task to do</span>--}}
{{--                                        <button type="submit" class="close"><i class="flaticon-trash ms-delete-trigger"> </i></button>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

{{--                            <div class="ms-card-footer clearfix">--}}
{{--                                <a href="#" class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive </a>--}}
{{--                                <a href="#" class="text-disabled  ms-delete-trigger float-right"> <i class="flaticon-trash"> </i> Delete </a>--}}
{{--                            </div>--}}

{{--                        </li>--}}
{{--                    </ul>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div role="tabpanel" class="tab-pane" id="qa-reminder">--}}
{{--                <div class="ms-quickbar-container ms-reminders">--}}

{{--                    <ul class="ms-qa-options">--}}
{{--                        <li> <a href="#" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-bell"></i> New Reminder </a> </li>--}}
{{--                    </ul>--}}

{{--                    <div class="ms-quickbar-container ms-scrollable">--}}

{{--                        <div class="ms-card ms-qa-card ms-deletable">--}}
{{--                            <div class="ms-card-body">--}}
{{--                                <p> Developer Meeting in Block B </p>--}}
{{--                                <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i> Today - 3:45 pm</span>--}}
{{--                            </div>--}}
{{--                            <div class="ms-card-footer clearfix">--}}

{{--                                <div class="ms-note-editor float-right">--}}
{{--                                    <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>--}}
{{--                                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="ms-card ms-qa-card ms-deletable">--}}
{{--                            <div class="ms-card-body">--}}
{{--                                <p> Start adding change log to version 2 </p>--}}
{{--                                <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i> Tomorrow - 12:00 pm</span>--}}
{{--                            </div>--}}
{{--                            <div class="ms-card-footer clearfix">--}}

{{--                                <div class="ms-note-editor float-right">--}}
{{--                                    <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>--}}
{{--                                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div role="tabpanel" class="tab-pane" id="qa-notes">--}}

{{--                <ul class="ms-qa-options">--}}
{{--                    <li> <a href="#" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-sticky-note"></i> New Note </a> </li>--}}
{{--                    <li> <a href="#"> <i class="flaticon-excel"></i> Export to Excel </a> </li>--}}
{{--                </ul>--}}

{{--                <div class="ms-quickbar-container ms-scrollable">--}}

{{--                    <div class="ms-card ms-qa-card ms-deletable">--}}
{{--                        <div class="ms-card-header">--}}
{{--                            <h6 class="ms-card-title">Don't forget to check with the designer</h6>--}}
{{--                        </div>--}}
{{--                        <div class="ms-card-body">--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in faucibus venenatis. Etiam at dapibus neque,--}}
{{--                                vel varius metus. Pellentesque eget orci malesuada, venenatis magna et--}}
{{--                            </p>--}}
{{--                            <ul class="ms-note-members clearfix mb-0">--}}
{{--                                <li class="ms-deletable"> <img src="https://via.placeholder.com/50x50" alt="member"> </li>--}}
{{--                                <li class="ms-deletable"> <img src="https://via.placeholder.com/50x50" alt="member"> </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="ms-card-footer clearfix">--}}

{{--                            <div class="dropdown float-left">--}}
{{--                                <a href="#" class="text-disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="flaticon-share-1"></i> Share--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li class="dropdown-menu-header">--}}
{{--                                        <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Share With</span></h6>--}}
{{--                                    </li>--}}
{{--                                    <li class="dropdown-divider"></li>--}}
{{--                                    <li class="ms-scrollable ms-dropdown-list ms-members-list">--}}
{{--                                        <a class="media p-2" href="#">--}}
{{--                                            <div class="mr-2 align-self-center">--}}
{{--                                                <img src="https://via.placeholder.com/50x50" class="ms-img-round" alt="people">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <span>John Doe</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a class="media p-2" href="#">--}}
{{--                                            <div class="mr-2 align-self-center">--}}
{{--                                                <img src="https://via.placeholder.com/50x50" class="ms-img-round" alt="people">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <span>Raymart Sandiago</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a class="media p-2" href="#">--}}
{{--                                            <div class="mr-2 align-self-center">--}}
{{--                                                <img src="https://via.placeholder.com/50x50" class="ms-img-round" alt="people">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <span>Heather Brown</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="ms-note-editor float-right">--}}
{{--                                <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>--}}
{{--                                <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="ms-card ms-qa-card ms-deletable">--}}
{{--                        <div class="ms-card-header">--}}
{{--                            <h6 class="ms-card-title">Perform the required unit tests</h6>--}}
{{--                        </div>--}}
{{--                        <div class="ms-card-body">--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in faucibus venenatis. Etiam at dapibus neque,--}}
{{--                                vel varius metus. Pellentesque eget orci malesuada, venenatis magna et--}}
{{--                            </p>--}}
{{--                            <ul class="ms-note-members clearfix mb-0">--}}
{{--                                <li class="ms-deletable"> <img src="https://via.placeholder.com/50x50" alt="member"> </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="ms-card-footer clearfix">--}}

{{--                            <div class="dropdown float-left">--}}
{{--                                <a href="#" class="text-disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="flaticon-share-1"></i> Share--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li class="dropdown-menu-header">--}}
{{--                                        <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Share With</span></h6>--}}
{{--                                    </li>--}}
{{--                                    <li class="dropdown-divider"></li>--}}
{{--                                    <li class="ms-scrollable ms-dropdown-list ms-members-list">--}}
{{--                                        <a class="media p-2" href="#">--}}
{{--                                            <div class="mr-2 align-self-center">--}}
{{--                                                <img src="https://via.placeholder.com/50x50" class="ms-img-round" alt="people">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <span>John Doe</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a class="media p-2" href="#">--}}
{{--                                            <div class="mr-2 align-self-center">--}}
{{--                                                <img src="https://via.placeholder.com/50x50" class="ms-img-round" alt="people">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <span>Raymart Sandiago</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <a class="media p-2" href="#">--}}
{{--                                            <div class="mr-2 align-self-center">--}}
{{--                                                <img src="https://via.placeholder.com/50x50" class="ms-img-round" alt="people">--}}
{{--                                            </div>--}}
{{--                                            <div class="media-body">--}}
{{--                                                <span>Heather Brown</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="ms-note-editor float-right">--}}
{{--                                <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>--}}
{{--                                <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div role="tabpanel" class="tab-pane" id="qa-invite">--}}

{{--                <div class="ms-quickbar-container text-center ms-invite-member">--}}
{{--                    <i class="flaticon-network"></i>--}}
{{--                    <p>Invite Team Members</p>--}}
{{--                    <form>--}}
{{--                        <div class="ms-form-group">--}}
{{--                            <input type="text" placeholder="Member Email" class="form-control" name="invite-email" value="">--}}
{{--                        </div>--}}
{{--                        <div class="ms-form-group">--}}
{{--                            <button type="submit" name="invite-member" class="btn btn-primary w-100">Invite</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div role="tabpanel" class="tab-pane" id="qa-settings">--}}

{{--                <div class="ms-quickbar-container text-center ms-invite-member">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12 text-left mb-5">--}}
{{--                            <h4 class="section-title bold">Restaurant Opening / Closing</h4>--}}
{{--                            <div>--}}
{{--                                <label class="ms-switch">--}}
{{--                                    <input type="checkbox" id="">--}}
{{--                                    <span class="ms-switch-slider round"></span>--}}
{{--                                </label>--}}
{{--                                <span> Closing Now </span>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-md-12 text-left">--}}
{{--                            <h4 class="section-title bold">Keyboard Shortcuts</h4>--}}
{{--                            <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>--}}
{{--                            <p class="ms-directions mb-0"><code>Alt + (1 -&gt; 6)</code> Open Quick Bar Tab</p>--}}
{{--                            <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--</aside>--}}
<!-- Reminder Modal -->
<div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title has-icon text-white"> New Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="ms-form-group">
                        <label>Remind me about</label>
                        <textarea class="form-control" name="reminder"></textarea>
                    </div>
                    <div class="ms-form-group"> <span class="ms-option-name fs-14">Repeat Daily</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox"> <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ms-form-group">
                                <input type="text" class="form-control datepicker" name="reminder-date" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ms-form-group">
                                <select class="form-control" name="reminder-time">
                                    <option value="">12:00 pm</option>
                                    <option value="">1:00 pm</option>
                                    <option value="">2:00 pm</option>
                                    <option value="">3:00 pm</option>
                                    <option value="">4:00 pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Notes Modal -->
<div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="ms-form-group">
                        <label>Note Title</label>
                        <input type="text" class="form-control" name="note-title" value="">
                    </div>
                    <div class="ms-form-group">
                        <label>Note Description</label>
                        <textarea class="form-control" name="note-description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="{{url('/admin/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('/admin/assets/js/popper.min.js')}}"></script>
<script src="{{url('/admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('/admin/assets/js/perfect-scrollbar.js')}}">
</script>
<script src="{{url('/admin/assets/js/jquery-ui.min.js')}}">
</script>
<!-- Global Required Scripts End -->
<!-- Page Specific Scripts Start -->
<script src="{{url('/admin/assets/js/Chart.bundle.min.js')}}">
</script>
<script src="{{url('/admin/assets/js/widgets.js')}}"> </script>
<script src="{{url('/admin/assets/js/clients.js')}}">
</script>
<script src="{{url('/admin/assets/js/Chart.Financial.js')}}">
</script>
<script src="{{url('/admin/assets/js/d3.v3.min.js')}}">
</script>
<script src="{{url('/admin/assets/js/topojson.v1.min.js')}}">
</script>
<script src="{{url('/admin/assets/js/datatables.min.js')}}">
</script>
<script src="{{url('/admin/assets/js/data-tables.js')}}">
</script>
<!-- Page Specific Scripts Finish -->
<!-- Costic core JavaScript -->
<script src="{{url('/admin/assets/js/framework.js')}}"></script>
<!-- Settings -->
<script src="{{url('/admin/assets/js/settings.js')}}"></script>

<!-- Page Specific Scripts Start -->

<!-- Page Specific Scripts Finish -->

<!-- Page Specific Scripts Start -->
  <script src="{{url('/admin/assets/js/promise.min.js')}}"> </script>
  <script src="{{url('/admin/assets/js/sweetalert2.min.js')}}"> </script>
  <script src="{{url('/admin/assets/js/sweet-alerts.js')}}"> </script>

<script src="{{url('/admin/assets/js/slick.min.js')}}"> </script>
<script src="{{url('/admin/assets/js/moment.js')}}"> </script>
<script src="{{url('/admin/assets/js/jquery.webticker.min.js')}}"> </script>
<script src="{{url('/admin/assets/libs/dropify/dropify.min.js')}}"></script>

<script src="{{url('/admin/assets/js/jquery.steps.min.js')}}"> </script>
<script src="{{url('/admin/assets/js/form-wizard.js')}}"> </script>
<script>
    $('#heart').on('click' , function(){
        console.log('fahmy');
    });
</script>






<script>


    function switchView(lang){

        $.ajax({
            url:"/admin/dashboard/lang/"+lang,
            method:"GET",
            success:function (data){
            console.log(data);

                location.reload();
            }
        });





    }


</script>



<script>
    function generateQR(QR){
       $("#qr_modal").fadeIn(500).modal({"show" : true});
    }
</script>

<script>
    var loadFile = function(event,id) {
        var output = document.getElementById('output_'+id);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }

        var formData = new FormData(document.getElementById("default-wizard"));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/admin/images/slider/uploader/"+id,

            data:formData,
            dataType:'JSON',
            cache: false,
            contentType: false,
            processData: false,
            method:"POST",
            type:'POST',
            success:function(response){}
        })
    };

    var loadFile2 = function(event,id) {
        var output = document.getElementById('output_'+id);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }


    };
</script>


<script src="https://jcuenod.github.io/imgCheckbox/assets/js/jquery.imgcheckbox.js"></script>
<script>



  function catCustom(id) {

      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"/admin/images/section/categories/"+id,
          method:"POST",
          data:$("#cat_form_"+id).serialize(),
          success:function(response){
              $("#cat_div_"+id).css('display' , 'none');
              $("#cat_btn_"+id).css('display' , 'initial');

              $('#title_'+id).text(response['cat_title_'+'{{app()->getLocale()}}'+'_'+id]);
              Swal.fire(
                  response.message ,
                  '' ,
                  'success'
              )
          }
      })
  }

    function catClick(id) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/admin/images/section/categories/click/"+id,
            method:"GET",
            success:function(response){
                Swal.fire(
                      response.message ,
                      '' ,
                      'success'
                )
            }
        })
    }


     function openCustom(id){
        $("#cat_div_"+id).css('display' , 'block');
         $("#cat_btn_"+id).css('display' , 'none');
     }
</script>
<script>
    function slidePosition(language){
        console.log(language);

        if(language === "en" || language === ""){




            $('.ms-main-aside').css({"text-align" : 'left' , 'direction':'ltr'})
            $('#body_content').css({"text-align" : 'left' , 'direction':'ltr'})
            $("#lang").text("ARABIC");
            $("#clickLangeFunction").attr("onclick" , "switchView('ar')");



            // $('#ms-side-nav').removeClass("ms-aside-right").addClass("ms-aside-left");
            // $("#ms-side-nav").addClass("ms-aside-open");

            $(".db-header-title").text("Welcome , Admin");
            $("#page_title").text("STEPS DASHBOARD");


            // $(".user-dropdown").removeClass('dropdown-menu-left').addClass('dropdown-menu-right');
            // $(".side-nav .menu-item ul li a.active").css({"left" : "auto" , "right" : "0"});
            // $(".side-nav .menu-item ul").css({"padding-left" : "40", "padding-right": "0px"});




            $('#bootstrap_link').attr("href" , "/admin/assets/css/bootstrap.min.css");
            $('#jquery_link').attr("href" , "/admin/assets/css/jquery-ui.min.css");
            $('#style_link').attr("href" , "/admin/assets/css/style.css");



        }

        else {

            $('.ms-main-aside').css({"text-align" : 'right' , 'direction':'rtl'})
            $('#body_content').css({"text-align" : 'right' , 'direction':'rtl'})
            $("#lang").text("ENGLISH");
            $("#clickLangeFunction").attr("onclick" , "switchView('en')");


            // $('#ms-side-nav').removeClass("ms-aside-left").addClass("ms-aside-right");
            // $("#ms-side-nav").addClass("ms-aside-open");

            $(".db-header-title").text("مرحبا , يامدير");
            $("#page_title").text("لوحة تحكم ستيبس");


            // $(".user-dropdown").removeClass('dropdown-menu-right').addClass('dropdown-menu-left');
            // $(".side-nav .menu-item ul li a.active").css({"left" : "0" , "right" : "auto"});
            // $(".side-nav .menu-item ul").css({"padding-left" : "0" , "padding-right": "15px"});



            $('#bootstrap_link').attr("href" , "/admin/assets/css/bootstrap-rtl.min.css");
            $('#jquery_link').attr("href" , "/admin/assets/css/jquery-ui-rtl.min.css");
            $('#style_link').attr("href" , "/admin/assets/css/style-rtl.css");


        }

    }
</script>
<script>

    var language =  "{{ \Illuminate\Support\Facades\Session::get("locale")}}";
    // console.log(language);
    slidePosition(language);
</script>

<script>
    let qty = document.querySelector("input[name='quantity']");
    qty.addEventListener("change", function (event) {
        if (this.value < 1) this.value = 1; // minimum is 1
        else this.value = Math.floor(this.value); // only integers allowed
    })
</script>

<script>
    function sendMail(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/admin/reservation/approval/"+id,
            method:"GET",
            success:function(response){
                if (response.status ===1){
                    Swal.fire(
                        response.message ,
                        '' ,
                        'success'
                    ).then(function() {(
                        location.reload()
                    )
                    });
                }else{
                    Swal.fire(
                        response.error ,
                        '' ,
                        'warning'
                    )
                }

            }
        })
    }

</script>
<script>
    // var notificationsWrapper   = $('.ms-dropdown-list');
    // var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    // var notificationsCountElem = notificationsToggle.find('i[data-count]');
    // var notificationsCount     = parseInt(notificationsCountElem.data('count'));
    var notifications          = $('.ms-dropdown-list');
    var notificationsCount          = parseInt($('.notif-count').text());

    // if (notificationsCount <= 0) {
    //     notifications.hide();
    // }
    channel.bind('my-event', function(data) {
        var existingNotifications = notifications.html();
        // var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
        <a class="media p-2" href="#">
                        <div class="media-body"> <span>`+data.message+`</span>
                            <p class="fs-10 my-1 text-disabled"><i class="material-icons"></i> `+data.date+`</p>
                        </div>
                    </a>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount ++;
        $('.notif-count').text(parseInt(notificationsCount));
        // notificationsCountElem.attr('data-count', notificationsCount);
        // notificationsWrapper.find('.notif-count').text(notificationsCount);
        // notifications.show();

    });
</script>
<script>
    var snd = new Audio("mixkit-software-interface-start-2574.mp3"); // buffers automatically when created
    snd.play();


</script>
</body>

</html>
