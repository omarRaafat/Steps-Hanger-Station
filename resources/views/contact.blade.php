@extends('layouts.child')
@section('content')
<style>
  .content-item h3{
    color:#301b72
  }
  .content-item p
  {
    color:#262626
  }



  </style>
<div id="content">
    <!-- Our Contact
    ============================================= -->
    <section class="contact text-center padding-100">
      <div class="container">
        <div class="row">
          <!-- Head Title -->
            <div class="head_title">

                <h1>{{__('menu.Send Message')}}</h1>
                <span class="welcome">{{__('menu.Keep in Touch')}}</span>
            </div>
            <!-- End# Head Title -->
          <!-- Contact form -->
          <div class="contact-form">
            <form id="contact_form" method="post" action="{{route('contact')}}" class="form">
                @csrf
              <!-- Form Group -->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="full_name" class="form-control text" placeholder="{{__('menu.Name *')}}" required />
                    </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="email" class="form-control text" placeholder="{{__('menu.E-mail *')}}" required />
                    </div>
                    <!-- End Element -->
                  </div>
                  <div class="col-md-4 col-sm-4 col-sx-12">
                    <!-- Element -->
                    <div class="element">
                      <input type="text" name="reason" class="form-control text" placeholder="{{__('menu.reason')}}" required />
                    </div>
                    <!-- End Element -->
                  </div>
                </div>
              </div>
              <!-- End form group -->
              <div class="row">
                <div class="col-md-12">
                  <!-- Form Group -->
                  <div class="form-group">
                    <!-- Element -->
                    <div class="element">
                      <div>
                        <!-- Element -->
                        <div class="element">
                          <textarea name="message" class="text textarea" placeholder="{{__('menu.Message *')}}"  required></textarea>
                        </div>
                        <!-- End Element -->
                      </div>
                    </div>
                    <!-- End Element -->
                  </div>
                  <!-- End form Group -->
                </div>
              </div>
                    <br>
              <!-- Element -->
              <div class="element">
                <input type="button"   onclick="contactNow()" value="{{__('menu.SEND2')}}"  class="btn container" style="background-color: {{$settings->theme_colour}};color:white;width:50%;
                    padding: 10px;"></input>

              </div>
              <!-- End Element -->
            </form>
            <div class="done">
        <strong>{{__('menu.Thank you!')}}</strong> {{__('menu.We have received your message.')}}
    </div>
          </div>
          <!-- End contact form -->
        </div>
      </div>
    </section>
    <!-- End contact -->
    <!-- Address content
    ============================================= -->
    <section class="address-content ">
      <!--  BG parallax -->
      <div id="address-content">
        <div class=""
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#address-content"

              >
          <!-- BG transparent -->
          <div class=" padding-100">
            <div class="container">
              <div class="row">
                <!-- Adress -->
                <div class="col-md-4 adress">
                  <!-- Icon -->
                  <div class="col-md-3 icon " > <i class="fa fa-road" style="background-color: {{$settings->theme_colour}};border: 2px solid {{$settings->theme_colour}};"></i> </div>
                  <!-- End Icon -->
                  <!-- Content Item -->
                  <div class="col-md-9 content-item">
                    <h3>{{__('menu.Address')}}</h3>
                    <p> {{__('menu.HeadQuarter')}} : {{$settings->location()}}.</p>
                  </div>
                  <!-- End content Item -->
                </div>
                <!--End Adress -->
                <!-- Phone -->
                <div class="col-md-4 Phone">
                  <!-- Icon -->
                  <div class="col-md-3 icon"> <i class="fa fa-phone" style="background-color: {{$settings->theme_colour}};border: 2px solid {{$settings->theme_colour}};"></i> </div>
                  <!-- End Icon -->
                  <!-- Content Item -->
                  <div class="col-md-9 content-item">
                    <h3>{{__('menu.PHONE')}}</h3>
                    <p>{{__('menu.Telephone')}} : (+966) {{$settings->phone}}</p>

                  </div>
                  <!-- End content Item -->
                </div>
                <!--End Phone -->
                <!-- Email -->
                <div class="col-md-4 email">
                  <!-- Icon -->
                  <div class="col-md-3 icon"> <i class="fa fa-envelope" style="background-color: {{$settings->theme_colour}};border: 2px solid {{$settings->theme_colour}};"></i> </div>
                  <!-- End Icon -->
                  <!-- Content Item -->
                  <div class="col-md-9 content-item">
                    <h3>{{__('menu.E-MAIL')}}</h3>
                    <p>{{__('menu.Support')}} : <a href="#">{{$settings->email}}</a></p>

                  </div>
                  <!-- End content Item -->
                </div>
                <!--End Email -->
              </div>
            </div>
          </div>
        </div>
        <!-- End BG transparent -->
      </div>
      <!-- End BG parallax -->
    </section>
    <!-- End address content -->
    {{-- <!-- Map
    ============================================= -->
    <div class="map">
      <div id="map"></div>
    </div>
    <!-- End map --> --}}
  </div>
  <!-- end of #content -->


@endsection
