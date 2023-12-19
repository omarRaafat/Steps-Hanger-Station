@extends('layouts.child')
@section('content')

    <div id="content" style=" direction :@if(\Illuminate\Support\Facades\Session::get('local') == 'en') ltr @else rtl @endif " >

        <!-- Testimonials

        ============================================= -->
        <section class="padding-100" >
            <div class="container" id="printableArea">
                <div class="row">
                    <!-- Article -->
                    <article class="blank-page">
                        <!-- Blank Page Content -->
                        <div class="col-md-12 text-center">
                            <h2> {{__('menu.checkout_header')}}</h2>

                            <!-- Divider -->


                            <div class="blog-divider"> <span></span> <img src="{{asset($receipt_logo)}}" height="60px"> <span></span> </div>
                            <!-- End#Divider -->
                            <p class="text-uppercase "> {{__('menu.Order Status')}} : {{$order_status}}  </p>
                        </div>
                    </article>
                    <!-- End# Article -->
                </div>
                <div class="ms-content-wrapper">
                    <div class="row">

                        <div class="col-md-12">


                            <div class="ms-panel">
                                <div class="ms-panel-header header-mini">
                                    <div class="d-flex justify-content-between">
                                        <h6 id="receipt_invoice_id" style="text-align: left">{{__('menu.Invoice')}} #{{$invoice_id}}</h6>



                                    </div>
                                </div>

                                <div class="ms-panel-body">

                                    <!-- Invoice To -->
                                    <div class="row align-items-center">


                                        <div class="col-md-6 ">
                                            <div id="receipt_qr" >

                                                {!! QrCode::size(100)->generate("https://".$_SERVER['HTTP_HOST'].'/receipt/'.$order_id); !!}
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="invoice-address" >
                                                <h6>{{__('menu.Restaurant')}} : {{@App\Models\Setting::first()->resName()}}  </h6>

                                                <h6>{{__('menu.Vat Number')}} : {{@App\Models\Vat::first()->vat_number}}</h6>
                                                <h6 id="receipt_receiver_number"  >  {{__('menu.Reciever')}}  {{$customer_phone}} </h6>

                                                <ul class="invoice-date" >
                                                    <li>{{__('menu.Invoice Date')}} : {{$order_date}}</li>
                                                    <li>{{__('menu.Invoice Time')}} : {{$order_time}}</li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <br>


                                    <!-- Invoice Table -->
                                    <div class="ms-invoice-table table-responsive mt-5">
                                        <table class="table table-hover text-right thead-light">
                                            <thead>
                                            <tr class="text-capitalize" style="background-color: {{$settings->theme_colour}};color: white">
                                                <th class="text-center w-5">{{__('menu.Cart Id')}}</th>
                                                <th class="text-left">{{__('menu.Meal')}}</th>
                                                <th>{{__('menu.Qty')}}</th>
                                                <th>{{__('menu.Unit Cost')}}</th>
                                                <th>{{__('menu.Total')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <td class="text-center"># {{$orderDetail->meal_id}}</td>
                                                <td class="text-left">{{$orderDetail->meal->mealName()}}</td>
                                                <td class="text-left">{{$orderDetail->quantity}}</td>
                                                <td class="text-left">{{$orderDetail->price}} {{__('menu.SAR')}}</td>
                                                <td class="text-left">{{$orderDetail->total_price}} {{__('menu.SAR')}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                        <div class="col-md-6 " id="receipt_summary" >
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td style="background-color: {{$settings->theme_colour}};color: white">{{__('menu.INVOICE SUBTOTAL')}}</td>
                                                    <td>{{$total_price}} {{__('menu.SAR')}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: {{$settings->theme_colour}};color: white">{{__('menu.VAT')}} ({{$vat}} %)</td>
                                                    <td>{{$vat_value}} {{__('menu.SAR')}} </td>
                                                </tr>
                                                <tr>
                                                    <td width="50%" style="background-color: {{$settings->theme_colour}};color: white">{{__('menu.INVOICE TOTAL')}}</td>
                                                    <td width="50%" style="font-weight: bold;">{{$total_price_after_vat}}
                                                        {{__('menu.SAR')}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <div class="container text-center print_btn">

                <a id="print_btn"  onclick="printDiv('printableArea')" class="btn btn-gold" style="background-color: {{$settings->theme_colour}};color: white"><i class="fa fa-print"></i> {{__('menu.Print Invoice')}}</a>
            </div>

        </section>

        <div  class="modal" tabindex="-1" id="loyalityPointsAlert" saleem="0" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title">Modal title</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
                    <div class="modal-body">
                        <h3 class="text-center">تم اضافة نقاط الى نظام الولاء الخاص  بك</h3>
                        <hr>
                        <div class="row  ">

                            <div class="col-md-{{$loyality->loyality_No}} text-center" style="font-size: 30px">
                                @for($i = 0;  $i<\Illuminate\Support\Facades\Auth::guard('web')->user()->loyality_order_No; $i++)

                                    <i class="{{$loyality->icon}}" ></i>
                                @endfor
                                @for($i = 0;  $i< ($loyality->loyality_No - \Illuminate\Support\Facades\Auth::guard('web')->user()->loyality_order_No ); $i++)
                                    <i class="{{$loyality->icon}}-o" ></i>

                                @endfor

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->
    </div>


    @endsection
