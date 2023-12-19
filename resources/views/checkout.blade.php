@extends('layouts.child')
@section('content')

{{--    <style lang="scss">--}}
{{--        *,--}}
{{--        ::before,--}}
{{--        ::after {--}}
{{--            font-family: 'Roboto', sans-serif;--}}
{{--            box-sizing: border-box;--}}
{{--            margin: 0;--}}
{{--        }--}}

{{--        :root {--}}
{{--            --spacing: 8px;--}}
{{--            --hue: 400;--}}
{{--            --background1: hsl(214, 14%, 20%);--}}
{{--            --background2: hsl(214, 14%, 13%);--}}
{{--            --background3: hsl(214, 14%, 5%);--}}
{{--            --brand1: hsl(var(--hue) 80% 60%);--}}
{{--            --text1: hsl(0,0%,100%);--}}
{{--            --text2: hsl(0,0%,90%);--}}
{{--        }--}}

{{--        code {--}}
{{--            background: var(--background3);--}}
{{--        }--}}

{{--        body {--}}
{{--            display: flex;--}}
{{--            flex-direction: column;--}}
{{--            align-items:center;--}}
{{--            justify-content:center;--}}
{{--            min-height: 100vh;--}}
{{--            background: var(--background1);--}}
{{--            flex-gap: var(--spacing);--}}
{{--            color: var(--text1);--}}
{{--            gap: var(--spacing);--}}
{{--            padding: calc(var(--spacing) * 2);--}}
{{--            font-size: 1.5rem;--}}
{{--        }--}}

{{--        @media only screen and (max-width: 600px) {--}}
{{--            body {--}}
{{--                font-size: 1rem;--}}
{{--            }--}}
{{--        }--}}

{{--        a {--}}
{{--            color: var(--brand1);--}}
{{--            text-decoration: none;--}}
{{--        }--}}

{{--        .number-code {--}}
{{--            // overflow: auto;--}}
{{--            > div {--}}
{{--                display: flex;--}}
{{--                > input:not(:last-child) {--}}
{{--                    margin-right: calc(var(--spacing) * 2);--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}

{{--        .content-area {--}}
{{--            display: flex;--}}
{{--            flex-direction: column;--}}
{{--            gap: calc(var(--spacing) * 2);--}}
{{--            background: var(--background2);--}}
{{--            padding: var(--spacing);--}}
{{--            border-radius: var(--spacing);--}}
{{--            max-width: min(100%, 50rem);--}}
{{--            p {--}}
{{--                color: var(--text2);--}}
{{--                font-size: .8em;--}}
{{--            }--}}
{{--        }--}}

{{--        form {--}}
{{--            background-color: grey;--}}
{{--            input.code-input {--}}
{{--                font-size: 1.5em;--}}
{{--                width: 1em;--}}
{{--                text-align: center;--}}
{{--                flex: 1 0 1em;--}}
{{--            }--}}
{{--            input[type='submit']{--}}
{{--                margin-left: auto;--}}
{{--                display: block;--}}
{{--                font-size: 1em;--}}
{{--                cursor: pointer;--}}
{{--                transition: all cubic-bezier(0.4, 0.0, 0.2, 1) .1s;--}}
{{--                &:hover {--}}
{{--                    background:var(--background3);--}}
{{--                }--}}
{{--            }--}}
{{--            input{--}}
{{--                padding: var(--spacing);--}}
{{--                border-radius: calc(var(--spacing) / 2);--}}
{{--                color: var(--text1);--}}
{{--                background: var(--background1);--}}
{{--                border: 0;--}}
{{--                border: 4px solid transparent;--}}
{{--                &:invalid {--}}
{{--                    box-shadow: none;--}}
{{--                }--}}
{{--                &:focus{--}}
{{--                    outline: none;--}}
{{--                    border: 4px solid var(--brand1);--}}
{{--                    background: var(--background3);--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}



{{--    </style>--}}

  <!-- Content
  <
    ============================================= -->
  <div id="content">
    <!-- My Account
    ============================================= -->
    <section class="myaccount text-left padding-100">
      <div class="container">

        <div class="row">
          <div class="col-md-12 carts-content">
            <div class="row">
              <!-- Cart Total -->
              <div class="col-md-6 carts-total ">
                <h3>{{__('menu.Carts Total')}}</h3><br>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>{{__('menu.Cart Subtotal')}}</td>
                      <td id="checkout_total_price_before_vat">{{$checkout_total_price}} {{__('menu.SAR')}}</td>
                    </tr>
                    @php($vat_value = $checkout_total_price * $vat->value/100)
                    @php($checkout_total_price_after_vat = $checkout_total_price + $vat_value )
                    <tr>
                      <td >{{__('menu.VAT')}} ({{$vat->value}} %)</td>
                      <td id="checkout_vat">{{$vat_value}} {{__('menu.SAR')}} </td>
                    </tr>
                    <tr>
                      <td>{{__('menu.Order Total')}}</td>
                        <td id="checkout_total_price"> {{$checkout_total_price_after_vat}} {{__('menu.SAR')}}</td>
                    </tr>
                  </tbody>
                </table>



                <!-- Carts total -->
                  <form id="coupon_form" class="form-inline" style="    margin-top: 20px

">
                      @csrf
                      <div class="form-group">
                          <input type="hidden" value="{{$checkout_total_price}}" name="total_before_vat">
                          <input type="text" class="form-control" name="coupon" placeholder="{{__('menu.Coupon Code')}}" style="    width: 320px;">
                      </div>
                      <input type="button" class="btn btn-black " value="{{__('menu.Apply')}}" onclick="couponCheck()" style="background-color:{{$settings->theme_colour}};color: white"/>
                  </form>
              </div>

              <!-- End # Cart Total -->
              <!-- Shipping Address -->
              {{-- <div class="col-md-4">
                <div class="calc-shipping">
                  <h3>Shipping Address</h3>
                  <div class="form-group">
                    <!-- Selct wrap -->
                    <div class="select_wrap dark_slect">
                      <select class="form-control">
                        <option value="">Select Delivery Method</option>
                        <option value="one">One</option>
                        <option value="two">Two</option>
                        <option value="three">Three</option>
                        <option value="four">Four</option>
                        <option value="five">Five</option>
                      </select>
                    </div>
                    <!-- End select wrap -->
                    <input type="text" class="form-control" placeholder="First Name*">
                    <input type="text" class="form-control" placeholder="Last Name*">
                    <input type="text" class="form-control" placeholder="Address*">
                    <input type="text" class="form-control" placeholder="City*">
                    <input type="text" class="form-control" placeholder="Postal Code">
                    <input type="text" class="form-control" placeholder="Phone Number*">
                    <input type="text" class="form-control" placeholder="Email">
                    <textarea class="form-control" placeholder="Order Notes"></textarea>
                  </div>
                </div>
                <!-- Shipping Address -->
              </div> --}}
              <!-- Billing Details -->
                @guest()
              <div class="col-md-6">
                <div class="calc-shipping">
                  <h3>{{__('menu.SignUp or Login to complete your process')}} </h3><br>
                    @if(session()->has("message"))
                    <div class="alert alert-danger">
                        <span>{{session()->get("message")}}</span>
                    </div>
                    @endif
                    @if(session()->has("activate"))
                        <div class="alert alert-warning">
                            <span>{{session()->get("activate")}}</span>
                        </div>
                    @endif
                    <form id="checkout_form" action="{{route("checkout")}}"  method="post">
                        @csrf

                  <div class="form-group">
                    <!-- Selct wrap -->
                    {{-- <div class="select_wrap dark_slect">
                      <select class="form-control">
                        <option value="">Select Country</option>
                        <option value="one">One</option>
                        <option value="two">Two</option>
                        <option value="three">Three</option>
                        <option value="four">Four</option>
                        <option value="five">Five</option>
                      </select>
                    </div> --}}
                    <!-- End select wrap -->




                    <input id="phone"  type="tel" name="phone"  value="{{old('phone')}}" class="form-control checkout_phone custom_widtho" placeholder="50xxxxx" onkeyup="  if (/^0/.test(this.value)) {
             this.value = this.value.replace(/^0/, 5)
         }"  required ><br><br>
                      <input type="password" name="password" id="order_password" class="form-control checkout_password" placeholder="{{__('menu.Password')}} *" onkeyup="checkInputs()" required >
                      <div class="select_wrap dark_select">
                          <label>{{__('menu.How to get your order')}} ?</label>
                          <select class="form-control checkout_type" name="type" onchange="checkSelects()" id="type" >

                              <option value="1" selected>{{__('menu.Drive Throw')}}</option>
                              <option value="2">{{__('menu.TakeAway')}}</option>
                              <option value="3">{{__('menu.TakeIn')}}</option>

                          </select>
                      </div>

                      <label>{{__('menu.When to collect your order (TIME)')}}?</label>
                      <input type="time" name="time" class="form-control checkout_time"  id="time" onchange="checkSelects()" value="02:00" style="width: 42%;">
                      <span class="text-danger" style="font-size: 20px;
    color: #ff000c;display: none" id="all_required"  >{{__('menu.Please Enter Required Inputs')}}</span>
{{--                     <div class="checkbox">--}}
{{--                      <label>--}}
{{--                        <input type="checkbox">--}}
{{--                        Ship the same address </label>--}}
{{--                    </div>--}}
                      <div class="select_wrap dark_select">
                          <label>{{__('menu.payment_method')}} ?</label>
                          <select class="form-control checkout_payment" name="payment_method" onchange="checkSelects()" id=""  >

                              <option value="VISA" selected>{{__('menu.VISA')}}</option>
                              <option value="MASTER">{{__('menu.MASTER CARD')}}</option>
                              <option value="MADA">{{__('menu.MADA')}}</option>
                              <option value="STC_PAY">{{__('menu.STC_PAY')}}</option>
                              <option value="APPLEPAY">{{__('menu.APPLEPAY')}}</option>

                          </select>
                      </div>
                      <input onclick="checkBeforeOrder()" class="btn form-control checkout_submit " id="order_button" type="button" value="{{__('menu.Order Now')}}"   style="background-color:{{$settings->theme_colour}};color: white;" />
                  </div>

                    </form>
                </div>
                <!-- Billing Details -->
              </div>
                @else
                    <div class="col-md-6">
                        <div class="calc-shipping">
                            <h3>{{__('menu.SignUp or Login to complete your process')}} </h3><br>
                    <form id="checkout_form" action="{{route("checkout")}}"  method="post">
                        @csrf

                        <div class="form-group">





                            <input type="hidden" name="checkout_total_price"  class="form-control"  value="{{$checkout_total_price}}">

                            <div class="select_wrap dark_select">
                                <label>{{__('menu.How to get your order')}} ?</label>
                                <select class="form-control checkout_type" name="type" onchange="checkSelects()" id=""  >

                                    <option value="1" selected>{{__('menu.Drive Throw')}}</option>
                                    <option value="2">{{__('menu.TakeAway')}}</option>
                                    <option value="3">{{__('menu.TakeIn')}}</option>

                                </select>
                            </div>

                            <label>{{__('menu.When to collect your order (TIME)')}}?</label>
                            <input type="time" name="time" class="form-control checkout_time"  id="time" onchange="checkSelects()" value="02:00" >
                            <div class="select_wrap dark_select">
                                <label>{{__('menu.payment_method')}} ?</label>
                                <select class="form-control checkout_payment" name="payment_method" onchange="checkSelects()" id=""  >

                                    <option value="VISA" selected>{{__('menu.VISA')}}</option>
                                    <option value="MASTER">{{__('menu.MASTER CARD')}}</option>
                                    <option value="MADA">{{__('menu.MADA')}}</option>
{{--                                    <option value="PAYPAL">{{__('menu.PAYPAL')}}</option>--}}

                                </select>
                            </div>
                            <input onclick="checkout()" class="btn form-control checkout_submit " type="button"  id="order_button2"  value="{{__('menu.Order Now')}}"  style="background-color:{{$settings->theme_colour}};color:#EDEDED;" />
                        </div>

                    </form>
                        </div>
                    </div>
                @endguest

            </div>
          </div>
        </div>
{{--          <form--}}
{{--              action="{{$payment['shopperResultUrl']}}"--}}
{{--              class="paymentWidgets"--}}
{{--              data-brands="VISA MASTER MADA"--}}
{{--          ></form>--}}
      </div>


    </section>
    <!-- End myaccount -->

  </div>
  <!-- end of #content -->
{{--<script src="{{ $payment['script_url'] }}"></script>--}}

 @endsection
