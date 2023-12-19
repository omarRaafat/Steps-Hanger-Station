@extends('layouts.child')
@section('content')

  <div id="content">
    <!-- Food Date blocks
    ============================================= -->
    <section id="slide2-02" class="date-block-dark text-center padding-100">
      <div class="container date-blocks">
          <div class="row">
              @if(!$settings->cat_1 && !$settings->cat_2 && !$settings->cat_3 && !$settings->cat_4)

                  <h3>COMMING SOON !</h3>
              @else
                  @if($settings->cat_1)
                      <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- Block item -->
                          <div class="block-item"> <img src="{{url('img/breakfast.png')}}" alt="" style="    width: 135px;">
                              <h3 style="color: {{$settings->text_colour}}">{{$settings->catTitle1()}}</h3>
                              <p style="color: {{$settings->text_colour}}">{{date('h:m A' , strtotime($settings->cat_time_from_1))}} - {{date('h:m A' , strtotime($settings->cat_time_to_1))}}</p>
                          </div>
                          <!-- End Block item -->
                      </div>
                  @endif
                  @if($settings->cat_2)
                      <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- Block item -->
                          <div class="block-item"> <img src="{{url('img/lunch.png')}}" alt="" style="    width: 135px;">
                              <h3 style="color: {{$settings->text_colour}}">{{$settings->catTitle2()}}</h3>
                              <p style="color: {{$settings->text_colour}}">{{date('h:m A' , strtotime($settings->cat_time_from_2))}} - {{date('h:m A' , strtotime($settings->cat_time_to_2))}}</p>
                          </div>
                          <!-- End Block item -->
                      </div>
                  @endif
                  @if($settings->cat_3)
                      <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- Block item -->
                          <div class="block-item"> <img src="{{url('img/dinner.png')}}" alt="" style="    width: 135px;">
                              <h3 style="color: {{$settings->text_colour}}">{{$settings->catTitle3()}}</h3>
                              <p style="color: {{$settings->text_colour}}">{{date('h:m A' , strtotime($settings->cat_time_from_3))}} - {{date('h:m A' , strtotime($settings->cat_time_to_3))}}</p>
                          </div>
                          <!-- End Block item -->
                      </div>
                  @endif
                  @if($settings->cat_4)
                      <div class="col-md-3 col-sm-6 col-xs-12">
                          <!-- Block item -->
                          <div class="block-item"> <img src="{{url('img/dessert.png')}}" alt="" style="    width: 135px;">
                              <h3 style="color: {{$settings->text_colour}}">{{$settings->catTitle4()}}</h3>
                              <p style="color: {{$settings->text_colour}}">{{date('h:m A' , strtotime($settings->cat_time_from_4))}} - {{date('h:m A' , strtotime($settings->cat_time_to_4))}}</p>
                          </div>
                          <!-- End Block item -->
                      </div>
                  @endif
              @endif
          </div>
      </div>
    </section>
    <!-- End date blocks-->
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
                                                      <input id="phone" type="tel" name="phone" onclick="forceZeroRm()" class="form-control"   value="@auth{{auth()->guard('web')->user()->phone}}@endauth" style="color: white;padding-right: 135px"   placeholder="50xxxxxxx" required>
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
                  <h2>Come & <span  style="color:{{$settings->text_colour}}">Experiences</span> our best of world class cuisine</h2>
                  <a href="contact.html" class="btn  btn-gold " style="background-color:{{$settings->theme_colour}};color:#EDEDED">GET IN TOUCH</a> </div>
          </div>
      </section>
    <!-- End extra touch -->

  </div>
  <!-- end of #content -->
 @endsection
