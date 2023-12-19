 @extends('layouts.child')
 @section('content')
     @php($settings = \App\Models\Setting::first())

 <!-- Content
    ============================================= -->
  <div id="content">
    <!-- Menu Grid
    ============================================= -->
    <div class="menu_grid our-menu text-center padding-b-70">
      <!-- Menu Bar -->
      <div class="menu-bar " style="background-color:{{$settings->theme_colour}};color:#EDEDED">
        <!-- menu Filter
                    ============================================= -->
        <ul id="menu-fillter" class="clearfix" style="direction: initial" >
            @foreach($menuCategories as $menuCategory)
          <li><a href="#" data-filter=".pf-{{$menuCategory->id}}" style="color:#EDEDED" >{{$menuCategory->categoryName()}}</a></li>
         @endforeach
          {{-- <li><a href="#" data-filter=".pf-drinks">DRINKS</a></li> --}}
        </ul>
        <!-- #menu-filter end -->
      </div>
      <!-- End menu bar -->
      <!-- Menu Items
                    ============================================= -->
      <div class="container mt60">
        <!-- Menu Items Masonary Content -->

        <div id="menu-items" class="masonry-content menu-type dark clearfix" >
        @foreach($menuMeals as $meal)
          <!-- Menu Item -->
          <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-{{$meal->meal_category_id}} ">
            <!-- Overlay Content -->

            <div class="overlay_content overlay-menu" >

              <!-- Overlay Item -->
              <div class="overlay_item"> <span class="label" style="color: white;background-color: {{$settings->theme_colour}}" >{{__('menu.best seller')}}</span> <img src="{{$meal->meal_image}}"  alt="">
                <!-- Overlay -->
                <div class="overlay" >
                  <!-- Icons -->
                  <div class="icons" >
                    <h3 ><a href="{{url('/user/menu/meal/detail/'.$meal->id)}}" style="color: white" > {{$meal->mealName()}}</a></h3>
                    <h3 style="color: white"> {{$meal->meal_price}} {{__('menu.SAR')}}</h3>
                    <!-- Rating -->
                    <fieldset class="rating">
                      <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                    </fieldset>
                    <!-- End Rating -->
                    <!-- Buttons -->
                      <div class="button"> <a class="btn btn-gold" onclick="fireToasting('{{$meal}}')" data-toggle="tooltip" title="" data-original-title="Add to Cart" style="background-color: {{$settings->theme_colour}}"><i class="fa fa-shopping-cart" style="color:#ffffff;"></i></a> <a class="btn btn-gold" href="{{url('/user/menu/meal/detail/'.$meal->id)}}"  data-toggle="tooltip" title="" data-original-title="MEAL DETAILS" style="background-color: {{$settings->theme_colour}} ;"><i class="fa fa-info-circle" style="color: #ffffff"></i>   <span class="tooltiptext" id="myTooltip"></span></a> </div>
                    <!-- End Buttons -->
                    <a class="close-overlay hidden">x</a> </div>
                  <!-- End Icons -->
                </div>
                <!-- End Overlay -->
              </div>
              <!-- End Overlay Item -->

            </div>

            <!-- End Overlay Content -->

          </article>
        @endforeach
          <!-- End Menu Item -->

        </div>

        <!-- End Menu Content -->
      </div>
      <!-- #menu end -->
      {{-- <a href="#" class="btn btn-gold mt30">View more</a> </div> --}}
    <!-- End Menu Grid -->
  </div>
  <!-- end of #content -->
 @endsection
