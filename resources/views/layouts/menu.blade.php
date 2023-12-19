<?php

if (Auth::guard('web')->check()) $cartItems = \App\Models\Cart::where(["user_id"=>Auth::guard('web')->user()->id , "status" => 0])->latest()->get();

else $cartItems = \App\Models\Cart::where(["IP_ADDRESS"=> \Request::ip() , "status" => 0])->latest()->get();


$checkout_total_price =0;
foreach ($cartItems as $cartItem){

    $cartItem->meal_image = $cartItem->meal->meal_image;
    $cartItem->meal_name = $cartItem->meal->mealName();
    $checkout_total_price += $cartItem->total_price;
}
?>
@php($settings = \App\Models\Setting::first())
<style>
    #main-menu ul li a:hover{
        color: {{$settings->theme_colour}};
    }

    #shop_cart>a>i:hover{
        color: {{$settings->theme_colour}};
    }
</style>

        <ul id="menu_items_ul_li">
          <li><a href="/">
            <div id="home">{{__('menu.home')}}</div>
            </a>

          </li>
          <li class="mega-menu"><a href="/menu">
            <div id="menu">{{__('menu.menu')}}</div>
            </a>
            {{-- <div class="mega-menu-content  col-1 clearfix">
              <ul>
                <li class="mega-menu-title">
                  <div id="menu_carousel">
                    <div class="item"> <a href="/menu"> <img class="img-responsive" src="img/drop_menu/8.jpg"  alt="starter">
                      <h2>Daily Dishes</h2>
                      </a> </div>

                  </div>
                </li>
                <li class="mega-menu-title">
                  <div id="menu_carousel">
                    <div class="item"> <a href="/menu"> <img class="img-responsive" src="img/drop_menu/6.jpg"  alt="starter">
                      <h2>Burgers</h2>
                      </a> </div>

                  </div>
                </li>

                <li class="mega-menu-title">
                  <div id="menu_carousel">
                    <div class="item"> <a href="/menu"> <img class="img-responsive" src="img/drop_menu/7.jpg"  alt="starter">
                      <h2>Stuffed Chicken</h2>
                      </a> </div>

                  </div>
                </li>
              </ul>
            </div> --}}
          </li>
          <li><a href="/reservation">
            <div id="reservation">{{__('menu.reservation')}}</div>
            </a> </li>


          <li><a href="/contact">
            <div id="contact">{{__('menu.contact')}}</div>
            </a> </li>
          <!-- Mega Menu
           ============================================= -->

          <!-- Mega Menu
           ============================================= -->

          <li>
              @guest()
              <a href="/user/login">
            <div id="login">{{__('menu.login')}}</div>
            </a>
              @else
                  <a href="/account">
                      <div id="">{{__('menu.account')}}</div>
                  </a>
@endguest
          </li>

          <li><a href="#" onclick="changeLocal()">
            <div id="locale">{{__('menu.language')}}</div>
            </a>

          </li>
        </ul>

        <!-- Top Cart
                      ============================================= -->
        <div id="shop_cart" > <a href="#" id="shop_tigger"><i class="fa fa-shopping-cart"></i><span class="cart_count" style="background-color: {{$settings->theme_colour}}">{{count($cartItems)}}</span></a>
          <div class="shop_cart_content">
            <h4>{{__('menu.Your Cart')}}</h4>


            <div class="cart_items">
                @foreach($cartItems as $cartItem)
              <div class="item clearfix cart_item_{{$cartItem->id}}" > <a href="#"><img src="{{$cartItem->meal_image}}" alt=""></a>
                <div class="item_desc"> <a href="#">{{Str::limit($cartItem->meal_name,14)}}</a> <span class="item_price">{{$cartItem->price}} {{__('menu.SAR')}}</span> <span class="item_quantity">x {{$cartItem->quantity}}</span> </div>
              </div>
              <!-- End item -->

                @endforeach
            </div>

            <!-- End cart items -->
                  <div class="shop_action clearfix"> <span class="shop_checkout_price" style="color: #ffffff">{{$checkout_total_price}} {{__('menu.SAR')}}</span>
                      <button class="btn  white" style="background-color: {{$settings->theme_colour}}"><a href="{{route('cart')}}" style="color:white;">{{__('menu.View Cart')}}</a></button>
          </div>
          <!-- End shop cart content -->

        </div>
        <!-- End shop cart -->

        </div>
