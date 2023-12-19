@extends('layouts.child')
@section('content')
  <!-- Content
    ============================================= -->

    <!-- Carts
    ============================================= -->

    <section class="carts text-center padding-100">
      <div class="container">
          @if(session()->has("message"))
              @if(session()->get('message') == 200)
                  <div class="alert alert-success">
                      <span>{{__('menu.success_payment')}}</span>
                  </div>
              @else
                  <div class="alert alert-warning">
                      <span>{{__('menu.failed_payment')}}</span>
                  </div>

              @endif
          @endif
          @if($cartItems->count() >0)
        <div class="row" id="cart_view">
          <div class="col-md-12">
<div  style="overflow-x:auto;">
            <!-- Table carts -->
            <table class="table table-striped table-responsive table-cart" style="">
              <thead>
                <tr>
                  <th >{{__('menu.Image')}}</th>
                    <th >{{__('menu.Name')}}</th>
                  <th >{{__('menu.Price')}}</th>
                  <th style="width:15%">{{__('menu.Quantity')}}</th>
                  <th >{{__('menu.Total')}}</th>
                    <th >{{__('menu.Delete')}}</th>
                </tr>
              </thead>
              <tbody>

              @foreach($cartItems as $cartItem)
                <tr class="cart_item_{{$cartItem->id}}">
                  <td><img src="{{$cartItem->meal->meal_image}}" alt=""> </td>
                    <td>
                        <a href="{{url("user/menu/meal/detail/".$cartItem->meal->id)}}"> <span   style="color: {{$settings->theme_colour}};">{{$cartItem->meal->mealName()}}</span></a>
                    </td>
                  <td>{{$cartItem->price}} {{__('menu.SAR')}}</td>
                  <td style="direction: initial;"><!-- input group minus & plus-->
                    <div class="input-group plus-minus">
                        <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number"  data-type="minus" onclick="decrease('{{$cartItem->meal}}','minus','{{$cartItem->meal->id}}', '{{$vat->value}}')" > <span class="fa fa-minus"></span> </button>
                      </span>

                      <input type="number" name="quant[1]" readonly class="form-control input-number" value="{{$cartItem->quantity}}" min="1" id="qnt_{{$cartItem->meal->id}}" >
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" onclick="increase('{{$cartItem->meal}}' ,'plus' ,'{{$cartItem->meal->id}}' , '{{$vat->value}}')" > <span class="fa fa-plus"></span> </button>
                      </span> </div>
                    <!-- End input group minus & plus --></td>
                  <td><span class="total" id="total_{{$cartItem->meal->id}}">{{$cartItem->total_price}} {{__('menu.SAR')}} </span> </td>
                    <td>
                        <a class="" onclick="removeItem('{{$cartItem->id}}','{{$vat->value}}')" style="cursor: pointer" ><i  class="fa fa-times"></i></a>
                    </td>
                </tr>
              @endforeach

              </tbody>
            </table>
</div>
            <!-- End Table carts  -->
              <div role="tabpanel" class="reviews-tabs padding-t-100">
                  <!-- Menu tabs -->

                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="review">
                          <!-- Comments -->
                          <div class="comment-blog">
                              <h2 id="reviews_count">{{__('menu.Add Special Request')}}</h2>
                              <div id="comments">


                              </div>



                              <div id="respond">
                              {{--                                                        <h3 id="reply-title">add a Review<small> <a rel="nofollow" id="cancel-comment-reply-link" href="#" class="cancelled">Cancel reply</a></small> </h3>--}}
                              <!-- Contact form -->
                                  <div class="contact-form">
                                      {{--                                                            <form id="review_form" method="POST" action="{{url("/user/menu/meal/review")}}">--}}
                                      @csrf
                                      <div class="row">
                                          <div class="col-md-12">
                                              <!-- Form Group -->
                                              <div class="form-group">
                                                  <!-- Element -->
                                                  <div class="element">
                                                      <input type="hidden" value="" name="meal_id">
                                                      <input type="hidden" value="" name="user_id">
                                                      <textarea name="notes"  id="notes" class="text textarea" placeholder="{{__('menu.Add Special Request to your order')}} *" ></textarea>
                                                  </div>
                                                  <!-- End Element -->
                                              </div>
                                              <!-- End form Group -->
                                          </div>
                                      </div>
                                      <!-- Element -->
                                      <br>
                                      <div class="element text-center">
                                          {{--                                                                    <input type="button" onclick="reviewMeal()"  value="Submit" class="btn btn-black " style="    background: #6653ff;"/>--}}
                                          <div class="loading"></div>
                                      </div>
                                      <!-- End Element -->
                                      {{--                                                            </form>--}}
                                      <div class="done mt30"> <strong>Thank you!</strong> We have received your message. </div>
                                  </div>
                                  <!-- End contact form -->
                              </div>


                          </div>
                          <!-- End# Comments -->
                      </div>
                      <!-- Description tab-->
                      <div role="tabpanel" class="tab-pane" id="description">
                          <div class="row">
                              <div class="col-md-6">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                              </div>
                              <div class="col-md-6">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                              </div>
                          </div>
                      </div>
                      <!-- End Description tab-->
                  </div>
                  <!-- End Tab panes -->
              </div>
          </div>

        @php($vat_value = $checkout_total_price * $vat->value/100)
        @php($checkout_total_price_after_vat = $checkout_total_price + $vat_value )
          <!-- Carts content -->
          <div class="col-md-12 carts-content">
            <div class="row">
              <!-- Left side -->

              <div class="col-md-6 cart_schedule">

                <!-- Carts total -->
                <div class="carts-total text-left margin-tb-60">
                  <h3 id="cart_header">{{__('menu.Carts Total')}}</h3>
                  <table class="table table-bordered" style="text-align: initial;">
                    <tbody>
                      <tr>
                        <td>{{__('menu.Cart Subtotal')}}</td>
                        <td class="shop_checkout_price">{{$checkout_total_price}} {{__('menu.SAR')}}</td>
                      </tr>

                      <tr>
                        <td>{{__('menu.VAT')}} ({{$vat->value}} %)</td>
                        <td id="vat_value">{{$vat_value}} {{__('menu.SAR')}}</td>
                      </tr>
                      <tr>
                        <td>{{__('menu.Order Total')}}</td>
                          <td class="shop_checkout_price_inc_vat">{{$checkout_total_price_after_vat}} {{__('menu.SAR')}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- Carts total -->
              </div>
                <div class="col-md-12 cart_button text-center ">
                    @php(date_default_timezone_set("Asia/Riyadh"))


                  @php($day_check = 1)
                    @php($days = json_decode($settings->opening_days) )

                    @if(in_array(strtoupper(date('D')) , $days))
                        @if(!(date('H') >= date('H' , strtotime($settings->cat_time_from_1)) || date('H') <= date('H' , strtotime($settings->cat_time_to_4))))
                            <span class="text-danger">المطعم غير متاح لتقديم الطلبات الأن طبقا لمواعيد العمل</span>
                        @endif

                    @else
                        <span class="text-danger">المطعم غير متاح لتقديم الطلبات الأن طبقا لأيام العمل</span>
                        @php($day_check=0)
                    @endif


<br><br>
                    <div class="form-group text-right checkout">
                        <a id="checkout_route" href="{{url('/checkout')}}" onclick="notes()"    @if(!(date('H') >= date('H' , strtotime($settings->cat_time_from_1)) || date('H') <= date('H' , strtotime($settings->cat_time_to_4)) )  || $day_check == 0) disabled="true" @endif class="btn btn-black btn-block container " style="background-color:{{$settings->theme_colour}};color: white;width: 50%;">{{__('menu.PROCEED TO CHECKOUT')}}</a>
                    </div>
                    <!-- Carts total -->

                    <!-- Carts total -->
                </div>
              <!-- End Left side -->
              <!-- Right side -->

              <!--End Right side -->
            </div>
          </div>
          <!--End Carts content -->
        </div>
          @else
              <span class="alert alert-warning alert-brand btn-block">{{__('menu.EMPTY CART')}}</span>
          @endif
      </div>
    </section>
    <!-- End Carts -->

  <!-- end of #content -->


  @endsection
