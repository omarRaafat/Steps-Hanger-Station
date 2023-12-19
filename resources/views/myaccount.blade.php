@extends('layouts.child')
@section('content')


    <!-- Content
    ============================================= -->
    <div id="content">

        <!-- My Account
        ============================================= -->
        <section class="myaccount text-left padding-100">
            <div class="container">



                    <!-- swiper1 -->
                     <div class="swiper-container swiper1 text-center container " style="text-align: initial" >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide selected">{{__('menu.MY ACCOUNT')}}</div>
                            <div class="swiper-slide" style="width: 100px">{{__('menu.PASSWORD CHANGE')}} </div>
                            <div class="swiper-slide">{{__('menu.PAST ORDERS')}}</div>
                            <div class="swiper-slide">{{__('menu.LOYALITY')}}</div>



                        </div>
                    </div>
                    <!-- swiper2 -->
                    <div class="swiper-container swiper2">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <!-- Account -->
                                <div class="account center-block ">
                                    <h2>{{__('menu.MY ACCOUNT')}}</h2>
                                    <form id="infoForm" method="POST" action="{{route("updateInfo")}}" class="form-horizontal container ">
                                        @csrf
                                        <div class="my_account_inputs" >
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input type="text"  value="{{auth()->guard('web')->user()->username}}" name="username" class="form-control" id="inputName" placeholder="{{__('menu.Full Name')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input type="email"  value="{{auth()->guard('web')->user()->email}}" name="email" class="form-control" id="inputEmail" placeholder="{{__('menu.Email')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input type="text"  class="form-control" id="inputCity" name="city" value="{{auth()->guard('web')->user()->city}}" placeholder="{{__('menu.City')}}">
                                            </div>
                                        </div>
                                        </div>
                                        <input onclick="changeInfo()" id="my_accoutn_btn" class="btn btn-black" type="button" value="{{__('menu.Save Changes')}}" style="background-color: {{$settings->theme_colour}};   "/>
                                    </form>
                                </div>
                                <!-- End Account -->


                        </div>
                            <div class="swiper-slide">

                                <!-- Password -->
                                <div class="password center-block ">

                                    <h2>{{__('menu.PASSWORD CHANGE')}}</h2>
                                    <form id="password_form" class="form-horizontal container ">
                                        @csrf
                                        <div class="inputs" >
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input type="password"  name="cur_password" class="form-control" id="InputPassword" placeholder="{{__('menu.Current Password (leave blank to leave unchanged)')}}">
                                                    <span id="password" class="text-danger" style="    font-size: 20px;"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input type="password" name="new_password" class="form-control" id="newInputPassword" placeholder="{{__('menu.New Password (leave blank to leave unchanged)')}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input type="password"  name="conf_password" class="form-control" id="confirmInputPassword" placeholder="{{__('menu.Confirm New Password')}}">
                                                </div>
                                                <span id="passwords" class="text-danger" style="    font-size: 20px;"></span>
                                            </div>
                                        </div>


                                        <input onclick="updatePassword()" type="button" value="{{__('menu.Update Password')}}" class="btn btn-black" style="background-color:  {{$settings->theme_colour}};   "/>

                                    </form>
                                </div>

                            </div>


                            <div class="swiper-slide" >

                                <div class="password  center-block" style="text-align: initial;overflow-y:scroll;height:300px;overflow-x:hidden;" >
                                    <h2 style="text-align: center">{{__('menu.PAST ORDERS')}}</h2>


                                            <table class="table">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th style="width: 20%" scope="col"># {{__('menu.ORDER NUMBER')}}</th>
                                                    <th style="width: 20%" scope="col">{{__('menu.ORDER STATUS')}}</th>
                                                    <th style="width: 20%" scope="col">{{__('menu.ORDER DATE')}}</th>
                                                    <th style="width: 20%" scope="col">{{__('menu.ORDER DETAIL')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody id="my_account_body" >
                                                @foreach($pastOrders as $pastOrder)
                                                <tr>
                                                    <th style="width: 20%" scope="row">{{$pastOrder->id}}</th>
                                                    <td style="width: 20%"> <small style="color: #0ac282">{{$pastOrder->status}}</small></td>
                                                    <td style="width: 20%">{{$pastOrder->date}}</td>
                                                    <td style="width: 20%"><a href="{{url("/receipt/".$pastOrder->id)}}" class="btn btn-black btn-block" style="background-color:  {{$settings->theme_colour}};width: 50%;margin: 0 auto">{{__('menu.DETAILS')}}</a> </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
{{--                                            <div class="order_list" >--}}
{{--                                            <a  class="card list-group-item list-group-item-action flex-column align-items-start " style="padding: 25px;border: 1px solid #301b72;--}}
{{--    border-radius: 15px;    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);width: 70%;--}}
{{--">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="d-flex w-100 justify-content-between col-md-3">--}}
{{--                                                        <h5 class="mb-1" style="color: #301b72">ORDER NUMBER  </h5>--}}
{{--                                                        <small>#{{$pastOrder->id}}</small>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="d-flex w-100 justify-content-between col-md-3">--}}
{{--                                                        <h5 class="mb-1" style="color: #301b72">ORDER STATUS  </h5>--}}
{{--                                                        <small style="color: #0ac282">{{$pastOrder->status}}</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex w-100 justify-content-between col-md-3">--}}
{{--                                                        <h5 class="mb-1" style="color: #301b72">ORDER DATE  </h5>--}}
{{--                                                        <small>{{$pastOrder->date}}</small>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="d-flex w-100 justify-content-between col-md-3  " style="--}}
{{--       background-color: rgb(102, 83, 255);--}}
{{--    color: white;--}}
{{--    border-radius: 36px;--}}
{{--    width: 125px;--}}
{{--    margin-top: 20px;--}}
{{--}--}}

{{--">--}}
{{--                                                        <h5 onclick="window.location='{{url("/checkout/receipt/".$pastOrder->id)}}'" class=" text-center" style="color: white;--}}
{{--    /* height: 23px; */--}}
{{--    line-height: 20px;--}}
{{--    border-radius: 10px;--}}
{{--    cursor: pointer;--}}
{{--">ORDER DETAIL  </h5>--}}

{{--                                                    </div>--}}


{{--                                                </div>--}}



{{--                                            </a>--}}
{{--                                            </div>--}}
                                            <br>


                                    {{--                        <button onclick="getOrders()" class="btn btn-black" style="background-color: #6653ff">Show Orders </button>--}}

                                </div>

                            </div>


                            <div class="swiper-slide">

                                @if($loyality->loyality_No)
                                    <h2>{{__('menu.LOYALITY')}}</h2>
                                    <div class="row container text-center " style="    margin-left: 35px;
}">

                                        <div class="col-md-{{$loyality->loyality_No}} text-center" style="font-size: 30px;text-align:right">
                                            @for($i = 0;  $i<\Illuminate\Support\Facades\Auth::guard('web')->user()->loyality_order_No; $i++)

                                                <i class="{{$loyality->icon}}" ></i>
                                            @endfor
                                            @for($i = 0;  $i< ($loyality->loyality_No - \Illuminate\Support\Facades\Auth::guard('web')->user()->loyality_order_No ); $i++)
                                                <i class="{{$loyality->icon}}-o" ></i>

                                            @endfor

                                        </div>

                                    </div>
                                <div class=" center-block ">

                                    @endif
                                    <div class="list-group" style="overflow-y:scroll;overflow-x:hidden; height:350px;padding: 15px">
                                        @if($coupons->count() > 0)
                                            @foreach($coupons as $coupon)
                                                <div class="coupon_list" >
                                                <a  class="card list-group-item list-group-item-action flex-column align-items-start "  style="border: 1px solid #301b72;
    border-radius: 15px;    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);    margin: 5px;padding: 5px;width: 70%;    margin-bottom: 20px;


">
                                                    <div class="container mt-5">
                                                        <div class="d-flex justify-content-center row">

                                                                <div class="coupon p-3 bg-white" style="width: 47%;">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-md-3 border-right  ">

                                                                            <h5 style="color: #afa3a3">{{__('menu.COUPON')}}</h5>
                                                                            <div class="d-flex flex-row justify-content-between off px-3 p-2"><h4>{{$coupon->coupon_code}}</h4></div>
                                                                            <div class="d-flex flex-column align-items-center"><h6 style="color: #afa3a3"  >
                                                                                    @php($expiry_date = date('d-m-Y' , strtotime($coupon->toDate)))
                                                                                    {{$coupon->toDate->diffForHumans()}}</h6></div>
                                                                        </div>
                                                                        <div class="col-md-4 text-center ">
                                                                            <h1>{{$coupon->coupon_discount}}%</h1>
                                                                        </div>

                                                                        <div class="col-md-5  vl" >
                                                                            <div>
                                                                                <div class="d-flex flex-row justify-content-end off">
                                                                                    @if($coupon->coupon_validity == "VALID")
                                                                                        <h4 style="color:#0ac282; ">  &nbsp;&nbsp;&nbsp;{{$coupon->coupon_validity}}</h4>
                                                                                    @else
                                                                                        <h4 style="color:darkred">{{$coupon->coupon_validity}}</h4>
                                                                                    @endif
                                                                                    <button  class="btn btn-black"   onclick="myFunction2('{{$coupon->coupon_code}}')" onmouseout="outFunc()" style="background-color: rgb(102, 83, 255);"><i class="fa fa-link"></i>
                                                                                        {{__('menu.Copy')}}</button>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                        </div>
                                                    </div>


                                                </a>

                                                </div>
                                            @endforeach
                                        @else
                                            <h3>{{__('menu.NO COUPONS FOR YOU YET !')}}</h3>
                                        @endif



                                    </div>


                                    <!-- End Password -->
                                </div>


                            </div>


                        </div>
                    </div>





                <br><hr>
                <div class="center-block" style="">

                    <a href="{{route("logout")}}" class="btn btn-black btn-block" style="background-color:  {{$settings->theme_colour}};width: 50%;margin: 0 auto">{{__('menu.Logout')}}</a>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog" id="pastOrders">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 105%">
                        <div class="modal-header">
                            <h5 class="modal-title">{{__('menu.Past Orders')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"   onclick="$(function () {
   $('#pastOrders').fadeOut(500).hide();
});">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table id="orders">
                                {{--                            <tr>--}}
                                {{--                                <th># Order ID</th>--}}
                                {{--                                <th>Status</th>--}}
                                {{--                                <th>Date</th>--}}
                                {{--                                <th>Total price</th>--}}
                                {{--                                <th>Total Include Vat</th>--}}
                                {{--                                <th>How To Get ?</th>--}}
                                {{--                            </tr>--}}
                                <tbody id="ordersBody">

                                </tbody>
                            </table>


                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="$(function () {
   $('#pastOrders').fadeOut(500).hide();
});">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" tabindex="-1" role="dialog" id="pastOrderDetail">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 105%">
                        <div class="modal-header">
                            <h5 class="modal-title">Order Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="$(function () {
   $('#pastOrderDetail').fadeOut(500).hide();
});">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table id="orders">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>

                                </tr>
                                <tbody id="orderDetailsBody">

                                </tbody>
                            </table>


                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" onclick="$(function () {
   $('#pastOrderDetail').fadeOut(500).hide();
});" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End myaccount -->

    </div>
    <!-- end of #content -->

@endsection
