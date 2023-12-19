@extends('admin.index')
@section('main')
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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Reckoning Transactions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Reckoning Transactions')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>


                                                    <th data-priority="2">{{__('messages.Vendor')}}</th>
                                                    <th data-priority="2"> {{__('messages.Orders')}}</th>
                                                    <th data-priority="2">{{__('messages.Total Sales')}}</th>
                                                    <th data-priority="2"> {{__('messages.Steps fee')}}</th>
                                                    <th data-priority="2"> {{__('messages.Vendor Profit')}}</th>
                                                    <th data-priority="2">{{__('messages.Account Number')}}</th>
                                                    <th data-priority="2"> {{__('messages.Reference Number')}}</th>
{{--                                                    <th data-priority="2">{{__('messages.Actions')}}</th>--}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($reckonings) > 0)
                                                @foreach($reckonings as $reckoning)
                                                <tr>
{{--                                                    <td><img src="{{Storage::disk('s3')->url("assets/".$subscripe->logo)}}"></td>--}}
                                                    <td>{{$reckoning->subscriber->store_name}}</td>
                                                    <td>{{$reckoning->orders}}</td>
                                                    <td>{{$reckoning->total_sales_excluded_tax}}</td>
                                                    <td>{{$reckoning->steps_fee}}</td>
                                                    <td>{{$reckoning->vendor_profit}}</td>
                                                    <td>{{$reckoning->account_number?$reckoning->account_number: '-- -- -- --'}}</td>
                                                    <td>{{$reckoning->reference_number?$reckoning->reference_number: '-- -- -- --'}}</td>
{{--                                                    <td>--}}
{{--                                                    <a href="show/accountants/{{$subscripe->id}}" class="btn btn-primary">{{__('messages.Show')}}</a>--}}
{{--                                                    </td>--}}
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr><td colspan="5" class="text-center">{{__('messages.No Data Yet')}}</td></tr>
                                            @endif
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
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
