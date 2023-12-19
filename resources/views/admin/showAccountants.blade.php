@extends('admin.index')
@section('main')
    <link href="/assetsAdmin/libs/dropify/dist/css/dropify.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .swal2-shown {
            overflow: unset !important;
            padding-right: 0px !important;
        }
    </style>
    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Show Accountant')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Accountant')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Show Accountant')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
{{--                            <div class="col-md-3">--}}
{{--                                <div class="card mini-stats-wid">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <div class="flex-grow-1">--}}
{{--                                                <p class="text-muted fw-medium">{{__('messages.Total Sales Included Tax')}}</p>--}}
{{--                                                <h4 class="mb-0"> {{$statistics['total_sales']}} SAR</h4>--}}
{{--                                            </div>--}}

{{--                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">--}}
{{--                                                <span class="avatar-title">--}}
{{--                                                    <i class="fas fa-money-bill-wave font-size-24"></i>--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">{{__('messages.Coming Orders')}}</p>
                                                <h4 class="mb-0">{{$statistics['orders_count']}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">{{__('messages.Last Reckoning Date')}}</p>
                                                <h4 class="mb-0">@if($statistics['reckoning']){{date('d-m-Y' , strtotime($statistics['reckoning']->created_at))}} @else
                                                    {{__('messages.NO RECKONING HISTORY YET')}} @endif </h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-calendar font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">{{__('messages.Last Reckoning Amount')}}</p>
                                                <h4 class="mb-0">@if($statistics['reckoning'])  {{$statistics['reckoning']->vendor_profit}} @else 0  @endif SAR</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-calendar font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="example-text-input" style="font-size:15px;" class="col-md-4 col-form-label">{{__('messages.Vendor')}}</label>
                                            <div class="col-md-10">
                                                <h4>{{$subscripes->store_name}}</h4>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="example-text-input" style="font-size:15px;" class="col-md-4 col-form-label">{{__('messages.Total Sales Excluded Tax')}}</label>
                                            <div class="col-md-10">
                                                <h4>SAR {{$statistics['total_sales_before_tax']}}</h4>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="example-text-input" style="font-size:15px;" class="col-md-4 col-form-label">{{__('messages.Total Sales Included Tax')}}</label>
                                            <div class="col-md-10">
                                                <h4>{{$statistics['total_sales']}} SAR</h4>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="example-text-input" style="font-size:15px;" class="col-md-4 col-form-label">{{__('messages.Steps Percentage')}}</label>
                                            <div class="col-md-10">
                                                <h4>{{$subscripes->	order_percentage	}}%</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="example-text-input" style="font-size:15px;" class="col-md-4 col-form-label">{{__('messages.Steps fee')}}</label>
                                            <div class="col-md-10">
                                                <h4>{{$statistics['steps_fee']}}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">

                                            <label for="example-text-input" style="font-size:15px;" class="col-md-4 col-form-label">{{__('messages.Vendor Profit')}}</label>
                                            <div class="col-md-10">
                                                <h4>{{$statistics['profit']}}</h4>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3>{{__('messages.Bank Information')}}</h3>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 d-flex bd-highlight row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Bank Name')}}</label>
                                    <div class="col-md-6 p-2 flex-grow-1 bd-highlight">
                                        <input class="form-control" name="store_link" id="store_link1" placeholder="Enter Store Link" value="{{$statistics['bank']->bank_name}}" type="text" disabled style="background-color:#fff;">
                                    </div>
                                    <div class="col-md-1 bd-highlight">

                                        @if($statistics['bank']->bank_name == 'البنك الأهلي التجاري')
                                        <img src="/assetsAdmin/images/banks/Al-ahly Bank.png" height="45px" alt="">
                                            @elseif($statistics['bank']->bank_name == 'البنك السعودي الفرنسي')
                                            <img src="/assetsAdmin/images/banks/Banque Saudi Fransi.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'البنك السعودي للاستثمار')
                                            <img src="/assetsAdmin/images/banks/The Saudi Investment Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'مصرف الراجحي')
                                            <img src="/assetsAdmin/images/banks/Al Rajhi Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'مصرف الانماء')
                                            <img src="/assetsAdmin/images/banks/Alinma Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'بنك الجزيرة')
                                            <img src="/assetsAdmin/images/banks/Al Jazeera Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'بنك البلاد')
                                            <img src="/assetsAdmin/images/banks/Al Bilad Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'بنك الرياض')
                                            <img src="/assetsAdmin/images/banks/Riyad Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'البنك العربي')
                                            <img src="/assetsAdmin/images/banks/Arab National Bank.png" height="45px" alt="">
                                        @elseif($statistics['bank']->bank_name == 'بنك ساب')
                                            <img src="/assetsAdmin/images/banks/SABB Bank.png" height="45px" alt="">


                                        @else
                                            <img src="/assetsAdmin/images/banks/Samba Bank.png" height="45px" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Account Number')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link2" placeholder="Enter Store Link" value="{{$statistics['bank']->account_number}}" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.IBAN')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link3" placeholder="Enter Store Link" value="{{$statistics['bank']->IBAN}}" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                                <div class="row">
                                    <h3>{{__('messages.send Profit')}}</h3>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
{{--                                                <div class="mb-3 row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <label>{{__('messages.From Date')}}</label>--}}
{{--                                                        <input type="date" name="fromDate" id="fromDate" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <label>{{__('messages.To Date')}}</label>--}}
{{--                                                        <input type="date" name="toDate" id="toDate" class="form-control">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="table-rep-plugin">--}}
{{--                                                    <div class="table-responsive mb-0" data-pattern="priority-columns">--}}
{{--                                                        <table id="tech-companies-1" class="table table-striped">--}}
{{--                                                            <thead>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th data-priority="2">{{__('messages.Last Payment')}}</th>--}}
{{--                                                                    <th data-priority="2">{{__('messages.Orders')}}</th>--}}
{{--                                                                    <th data-priority="2">{{__('messages.Amount')}}</th>--}}
{{--                                                                    <th data-priority="2">{{__('messages.Account Number')}}</th>--}}
{{--                                                                </tr>--}}
{{--                                                            </thead>--}}
{{--                                                            <tbody>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td>2021-11-02</td>--}}
{{--                                                                    <td>1000</td>--}}
{{--                                                                    <td>90000</td>--}}
{{--                                                                    <td>xxxxxxxxxxxx2367</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                <td>2021-11-03</td>--}}
{{--                                                                    <td>500</td>--}}
{{--                                                                    <td>50000</td>--}}
{{--                                                                    <td>xxxxxxxxxxxx1732</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                <td>2021-11-03</td>--}}
{{--                                                                    <td>500</td>--}}
{{--                                                                    <td>50000</td>--}}
{{--                                                                    <td>xxxxxxxxxxxx1732</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                <td>2021-11-03</td>--}}
{{--                                                                    <td>500</td>--}}
{{--                                                                    <td>50000</td>--}}
{{--                                                                    <td>xxxxxxxxxxxx1732</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                <td>2021-11-03</td>--}}
{{--                                                                    <td>500</td>--}}
{{--                                                                    <td>50000</td>--}}
{{--                                                                    <td>xxxxxxxxxxxx1732</td>--}}
{{--                                                                </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="mb-3 row">
                                                    <div class="col-md-12 pt-4 text-center">
                                                        <button class="btn btn-success w-50 btn-lg" @if($statistics['orders_count'] ==0 ) disabled @endif onclick="reckoning({{$subscripes->id}})">{{__('messages.Reckoning')}} @if($statistics['orders_count'] ==0 ) <i class="fa fa-check"></i> @endif</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="/assetsAdmin/libs/dropify/dropify.min.js"></script>
    <script>
       function reckoning(id) {

           $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: '{{url(app()->getLocale().'/admin/accountant/reckoning')}}',
               method: "POST",
               data : {"sub_id" : id},
               success: function (response) {

                   Swal.fire({
                       title: 'لقد تمت التصفية بنجاح !',
                       confirmButtonText: 'تم',
                       icon: 'success',
                       timer: 2500
                   }).then(function() {(
                       location.reload()
                   )
                   });
               }
           });

       }
    </script>
@endsection
