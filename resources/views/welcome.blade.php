@extends('layouts.app')
  @section('content')
  <div id="content">
    <!-- Welcome block
    ============================================= -->
    <section  class="padding-100 welcome-block">
      <div class="container">
        <div class="row">
          <div class="col-md-6"> <img class="img-responsive" src="{{asset($settings->about_image)}}" alt=""> </div>
          <!-- Intro message -->
          <div class="col-md-5 text-center intro_message mt40">
            <!-- Head Title -->
            <div class="head_title">
                {{-- <i class="icon-intro"></i> --}}
                <h1 style="color:{{$settings->text_colour}}">{{$settings->resName()}}</h1>
                <span class="welcome"  style="color:{{$settings->text_colour}}"> {{__('menu.Welcome to')}}  </span>
            </div>
            <!-- End# Head Title -->
            <p style="color:#262626;text-align: justify">{{$settings->resDesc()}}</p>
            {{-- <a href="about.html" class="btn btn-gold">READ MORE</a> </div> --}}
          <!-- End Intro message  -->
        </div>
      </div>
      </div>
    </section>
    <!-- End Welcome block -->


    <!-- Food Date blocks
    ============================================= -->
      @if($settings->cat_1 || $settings->cat_2 || $settings->cat_3 || $settings->cat_4)
    <section id="slide2-02" class="date-blocks dark text-center">

      <!-- Bg Parallax -->
      <div class="bck "
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 100px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#slide2-02"
           style="background-color:{{$settings->theme_colour}}"
    >
        <!-- Bg transparent -->
        <div class=" padding-100">
          <div class="container">
              <div class="row">




                      @if($settings->cat_1)
                          <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- Block item -->
                              <div class="block-item"> <img src="{{url('img/_breakfast.png')}}" alt="" style="    width: 135px;">
                                  <h3  style="color: white">{{$settings->catTitle1()}}</h3>
                                  <p style="color: white">{{date('h:m A' , strtotime($settings->cat_time_from_1))}} - {{date('h:m A' , strtotime($settings->cat_time_to_1))}}</p>
                              </div>
                              <!-- End Block item -->
                          </div>
                      @endif
                      @if($settings->cat_2)
                          <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- Block item -->
                              <div class="block-item"> <img src="{{url('img/_lunch.png')}}" alt="" style="    width: 135px;">
                                  <h3 style="color: white" >{{$settings->catTitle2()}}</h3>
                                  <p style="color: white">{{date('h:m A' , strtotime($settings->cat_time_from_2))}} - {{date('h:m A' , strtotime($settings->cat_time_to_2))}}</p>
                              </div>
                              <!-- End Block item -->
                          </div>
                      @endif
                      @if($settings->cat_3)
                          <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- Block item -->
                              <div class="block-item"> <img src="{{url('img/_dinner.png')}}" alt="" style="    width: 135px;">
                                  <h3 style="color: white" >{{$settings->catTitle3()}}</h3>
                                  <p style="color: white">{{date('h:m A' , strtotime($settings->cat_time_from_3))}} - {{date('h:m A' , strtotime($settings->cat_time_to_3))}}</p>
                              </div>
                              <!-- End Block item -->
                          </div>
                      @endif
                      @if($settings->cat_4)
                          <div class="col-md-3 col-sm-6 col-xs-12">
                              <!-- Block item -->
                              <div class="block-item"> <img src="{{url('img/_dessert.png')}}" alt="" style="    width: 135px;">
                                  <h3 style="color: white" >{{$settings->catTitle4()}}</h3>
                                  <p style="color: white">{{date('h:m A' , strtotime($settings->cat_time_from_4))}} - {{date('h:m A' , strtotime($settings->cat_time_to_4))}}</p>
                              </div>
                              <!-- End Block item -->
                          </div>
                      @endif

              </div>
          </div>
        </div>
        <!-- End bg transparent -->
      </div>
      <!-- End Bg Parallax -->

    </section>
  @endif
    <!-- End date blocks-->
    <!-- Masonry Menu
    ============================================= -->
    <section class="masonry_menu padding-100 text-center ">

      <!-- Head Title -->
        <div class="head_title">
            {{-- <i class="icon-intro"></i> --}}
            <h1  style="color:{{$settings->text_colour}}"> {{__('menu.Menu Meals')}} {{$settings->resName()}}</h1>
            <span  class="welcome" style="color:#262626">Choose & Taste</span>
        </div>
        <!-- End# Head Title -->

      <!-- Menu Bar -->
      <div class="menu-bar  mb60"    style="background-color:{{$settings->theme_colour}}">
        <!-- menu Filter
                    ============================================= -->
        <ul id="menu-fillter" class="clearfix" style="direction: initial">
            @foreach($menuCategories as $menuCategory)
                <li><a href="#" data-filter=".pf-{{$menuCategory->id}}" style="color:#EDEDED" >{{$menuCategory->categoryName()}}</a></li>
            @endforeach
          {{-- <li><a href="#" data-filter=".pf-desert">DESERT</a></li>
          <li><a href="#" data-filter=".pf-drinks">DRINKS</a></li> --}}
        </ul>
        <!-- #menu-filter end -->
      </div>
      <!-- End menu bar -->
      <!-- Menu Items
                    ============================================= -->
      <div class="container">
        <!-- Menu Items Masonary Content -->
        <div id="menu-items" class="masonry-content dark clearfix " >
            <div class="row">
        @foreach($meals as $meal)

          <!-- Menu Item -->
          <article class="menu-item pf-{{$meal->meal_category_id}}  ">
            <!-- Overlay Content -->
{{--              onclick="window.location.href='/user/menu/meal/detail/{{$meal->id}}'"--}}

            <div class="overlay_content overlay-menu  " >
              <!-- Overlay Item -->

              <div class="overlay_item"> <img src="{{$meal->meal_image}}" alt="" >
                <div class="overlay">
                  <div class="icons">

                      <h3  > <a href="{{url('/user/menu/meal/detail/'.$meal->id)}}" style="color: white">{{$meal->mealName()}} </a></h3>
                    <h3 style="color: white">{{$meal->meal_price}} {{__('menu.SAR')}}</h3>
                    <!-- Rating -->
{{--                    <fieldset class="rating">--}}
{{--                      <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>--}}
{{--                    </fieldset>--}}
                    <!-- end Rating -->
                    <!-- Button -->
                      <div class="button"> <a class="btn btn-gold" onclick="fireToasting('{{$meal}}')" data-toggle="tooltip" title="" data-original-title="Add to Cart" style="background-color: {{$settings->theme_colour}}"><i class="fa fa-shopping-cart" style="color: #ffffff"></i></a> <a class="btn btn-gold" href="{{url('/user/menu/meal/detail/'.$meal->id)}}"  data-toggle="tooltip" title="" data-original-title="MEAL DETAILS" style="background-color: {{$settings->theme_colour}};"><i class="fa fa-info-circle" style="color: #ffffff"></i>   <span class="tooltiptext" id="myTooltip"></span></a> </div>
                    <!-- End Button -->

                    <a class="close-overlay hidden">x</a> </div>
                </div>
              </div>

              <!-- Overlay Item -->
            </div>
              <hr>
            <!-- End Overlay Content -->
          </article>

          <!-- End Menu Item -->
            @endforeach
            </div>
        </div>
        <!-- #menu end -->
      </div>
      <!-- end of container -->
    </section>
    <!-- End masonry -->
    <!-- RESERVATION
    ============================================= -->
    <section id="slide2-03" class="reservation dark text-center" >
      <!-- Bg Parallax -->
      <div class="bcg "

        style="@if(count($pages) > 0) background:url({{$pages[0]->image}})@endif;background-size:cover"
      >
        <!-- Bg Transparent -->
        <div class="bg-transparent padding-100">
          <div class="container">
            <div class="row">
              <!-- Head Title -->
                <div class="head_title">
                    {{-- <i class="icon-intro"></i> --}}
                    <h1 style="color: white">{{__('menu.Reservations')}}</h1>
                        <span class="welcome">{{__('menu.Book your table')}}</span>
                </div>
                <!-- End# Head Title -->

              <!-- Reservation form style2-->
              <form id="reservation_form" class="reserv_form reserv_style2" action="{{route('reservation')}}" method="post">
                  @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <!-- Form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input name="full_name" class="form-control" type="text"  value="@auth{{auth()->guard('web')->user()->username}}@endauth" style="color: white" placeholder="Your Name *"  required>
                                </div>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input name="email" class="form-control"   value="@auth{{auth()->guard('web')->user()->email}}@endauth" style="color: white"   type="email"  placeholder="email" >
                                </div>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input id="phone" type="tel" name="phone" onclick="forceZeroRm()" class="form-control"   value="@auth{{auth()->guard('web')->user()->phone}}@endauth" style="color: white;padding-right: 160px"   placeholder="50xxxxxxx" required>
                                </div>
<br>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select class="form-control" name="branch_name" >
                                        <option  disabled selected style="color: white" >select your preferred branch</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->branchName()}}" style="color: rgb(102, 83, 255)">{{$branch->branchName()}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input name="num_of_persons" class="form-control" type="number" placeholder="Number of Persons"  required>
                                </div>

                                <div class="col-md-6 col-sm-6 col-sx-12 datepicker">
                                    <input name="reservation_date" class="form-control" id="" placeholder="YY-m-d"  data-date-format="YYYY MMMM DD "  type="date" required >
{{--                                    <i class="fa fa-calendar" style="color: {{$settings->theme_colour}}"></i>--}}
                                </div>
                                <div class="col-md-6 col-sm-6 col-sx-12 datepicker">
                                    <input name="time" class="form-control" id="" placeholder="Time" type="time"  required>
{{--                                    <i class="fa fa-calendar" style="color: {{$settings->theme_colour}}"></i>--}}
                                </div>
                            {{--                          <div class="col-md-6 col-sm-6 col-sx-12">--}}
                            <!-- Selct wrap -->
                            {{--                            <div class="select_wrap">--}}
                            {{--                              <select class="form-control" name="occasion">--}}
                            {{--                                <option value="one">Occasion *</option>--}}
                            {{--                                <option value="d">One</option>--}}
                            {{--                                <option value="two">Two</option>--}}
                            {{--                                <option value="three">Three</option>--}}
                            {{--                                <option value="four">Four</option>--}}
                            {{--                                <option value="five">Five</option>--}}
                            {{--                              </select>--}}
                            {{--                            </div>--}}
                            <!-- End select wrap -->
                                {{--                          </div>--}}
                                {{--                          <div class="col-md-6 col-sm-6 col-sx-12">--}}
                                {{--                            <!-- Selct wrap -->--}}
                                {{--                            <div class="select_wrap">--}}
                                {{--                              <select class="form-control" name="food">--}}
                                {{--                                <option value="one">Preferred food *</option>--}}
                                {{--                                <option value="d">One</option>--}}
                                {{--                                <option value="two">Two</option>--}}
                                {{--                                <option value="three">Three</option>--}}
                                {{--                                <option value="four">Four</option>--}}
                                {{--                                <option value="five">Five</option>--}}
                                {{--                              </select>--}}
                                {{--                            </div>--}}
                                {{--                            <!-- End select wrap -->--}}
                                {{--                          </div>--}}
                            </div>
                        </div>
                      <!-- End form group -->
                      <!-- Form Group -->

                      </div>
                      <!-- End form group -->
                    </div>
                    <div class="col-md-6">
                        <!-- form group -->
                        <div class="form-group">
                            <textarea name="message" placeholder="{{__('menu.Message')}}"></textarea>
                        </div>
                        <!-- End form group -->
                    </div>
                  </div>


                <div class="row element">
                  <div class="loading2"></div>
                    <button class="btn btn-gold white"   onclick="reservation()" id="reser-submit" style="background-color:{{$settings->theme_colour}};margin-top: 25
px; color: white">{{__('menu.BOOK YOUR TABLE')}}</button>
                </div>
            </form>
              <!-- End reserv home -->
            <div class="done2">
              <strong>Thank you!</strong> We have received your message.
          </div>
              <!-- End reserv home -->
            </div>
          </div>
        </div>
        <!-- End bg transparent -->
      </div>
      <!-- End Bg Parallax -->
    </section>
    <!-- End RESERVATION -->


    <!-- Extra touch Block
    ============================================= -->
    <section class="extra_touch padding-100 text-center">
      <div class="container">
        <div class="row">
          <h2>{{__('menu.Come')}} {{__('menu.&')}} <span  style="color:{{$settings->text_colour}}">{{__('menu.Experiences')}}</span>
              {{__('menu.our best of world class cuisine')}}</h2>
          <a href="{{url('/contact')}}" class="btn  btn-gold " style="background-color:{{$settings->theme_colour}};color:#EDEDED">{{__('menu.GET IN TOUCH')}}</a> </div>
      </div>
    </section>
    <!-- End extra touch -->
  </div>
   <!-- App
    ============================================= -->
{{--    <section id="slide-3-5" class="app dark">--}}
{{--        <!-- Bg Parallax -->--}}
{{--        <div class="bcg"--}}
{{--              data-center="background-position: 50% 0px;"--}}
{{--              data-bottom-top="background-position: 50% 100px;"--}}
{{--              data-top-bottom="background-position: 50% -100px;"--}}
{{--              data-anchor-target="#slide-3-5"--}}
{{--              style="background-image:url('img/background/bg_12.jpg');background-size:cover"--}}
{{--            >--}}
{{--          <!-- Bg transparent -->--}}
{{--          <div class="bg-transparent padding-50">--}}
{{--            <div class="container">--}}
{{--              <div class="row">--}}
{{--                <div class="col-md-5 col-sm-0">--}}
{{--                  <!-- App Img  -->--}}
{{--                  <img class="absolute" src="{{url('/img/app.PNG')}}" alt="">--}}
{{--                  <!-- End App Img  -->--}}
{{--                </div>--}}
{{--                <div class="col-md-7 col-sm-12">--}}
{{--                  <!-- App Content -->--}}
{{--                  <div class="padding-100 app_content">--}}
{{--                    <h1><span>Become</span> Life <span>More</span> Easier</h1>--}}
{{--                    <p class="italic">We aim to home-produce as much as possible – for the best quality, and to reduce “food miles”.  Our delicious cakes, traditional Devon scones, breads, soups, sauces and accompaniments are  Even our bottled water is produced in-house, using a sophisticated seven-stage filtration  .</p>--}}
{{--                    <!-- Buttons -->--}}
{{--                    <div class="buttons"> <a href="#" class="btn  btn-gold white" style="background-color:#6653ff">Google play store</a> <a href="#" class="btn btn-gold white" style="background-color:#6653ff">Apple store</a> </div>--}}
{{--                    <!--End Buttons -->--}}
{{--                  </div>--}}
{{--                  <!-- End App Content -->--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <!-- End bg transparent -->--}}
{{--        </div>--}}
{{--        <!-- End Bg Parallax -->--}}
{{--      </section>--}}
      <!-- End app -->
  <!-- End content !-->

{{--  <div class="modal" tabindex="-1" role="dialog" id="welcomePopup">--}}
{{--      <div class="modal-dialog" role="document">--}}
{{--          <div class="modal-content">--}}
{{--              <div class="modal-header">--}}
{{--                  <h5 class="modal-title">Select Branch to get your erxperience</h5>--}}
{{--                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                      <span aria-hidden="true">&times;</span>--}}
{{--                  </button>--}}
{{--              </div>--}}
{{--              <div class="modal-body text-center">--}}
{{--                 <div class="row">--}}
{{--                     @if($branches->count()>0)--}}
{{--                     @foreach($branches as $branch)--}}
{{--                  <div class=" col-md-4">--}}
{{--                      <div class="card" style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;    padding: 20px;">--}}
{{--                          <i class="fa fa-map-marker fa-3x"></i>--}}
{{--                          <div class="card-body">--}}
{{--                              <h5 class="card-title">{{$branch->branchName()}}</h5>--}}

{{--                              <a href="#" class="btn btn-primary" onclick="toastr.success('branch selected');" data-dismiss="modal" >Select</a>--}}
{{--                          </div>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                         @endforeach--}}
{{--                             @else--}}
{{--                                 <h3>all meals selected from the headquarter branch</h3>--}}
{{--                                 @endif--}}


{{--                 </div>--}}
{{--              </div>--}}

{{--              <div class="modal-footer">--}}

{{--              </div>--}}
{{--          </div>--}}
{{--      </div>--}}
{{--  </div>--}}

  @endsection
