@extends('layouts.admin_container')
@section('content')
<meta name="_token" content="{{ csrf_token() }}">


<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                <li class="breadcrumb-item" aria-current="page">{{__('menu.Reports')}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{__('menu.Orders')}}</li>
            </ol>
            </nav>
        </div>

        <div class="col-md-6 pt-4 searchStatus">
        <label>{{__('menu.Search By Order Status')}}</label>
            <select name="orderStatus" id="orderStatus" class="form-control">
                <option disabled selected>-- choose status --</option>
                <option value="0">Processing</option>
                <option value="1">Success</option>
                <option value="2">Canceled</option>
            </select>
        </div>

        <div class="col-md-6 pt-4 searchDate">
        <label>{{__('menu.Search By Order Date')}}</label>
            <input type="date" placeholder="Search By Order Date" name="searchDate" id="searchDate" class="form-control">
        </div>

        <div class="col-md-12 pt-4">
            <div id="prinitingArea">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>{{__('menu.Orders Statistics')}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive text-center">
                            <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                <th scope="col">{{__('menu.Order ID')}}</th>
                                <th scope="col">{{__('menu.Date')}}</th>
                                <th scope="col">{{__('menu.Sub Total')}}</th>
                                <th scope="col">{{__('menu.Total After Tax')}}</th>
                                <th scope="col">{{__('menu.User')}}</th>
                                <th scope="col">{{__('menu.Status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($orders) > 0)
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->date}}</td>
                                        <td>{{$order->subtotal}}</td>
                                        <td>{{$order->total_after_tax}}</td>
                                        <td>{{@App\Models\User::find($order->user_id)->username}}</td>
                                        <td>{{$order->status}}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center">{{__('menu.No Orders Here')}}</td></tr>
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button onclick="printDiv('prinitingArea')" class="btn btn-primary">{{__('menu.Print Orders Data')}}</button>
      </div>
    </div>
</div>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
</script>
<script type="application/javascript">
    $(document).ready(function(){
        $('#orderStatus').on('change' , function(){
            var valueDate = $(this).val();

            $.ajax({
                type : 'GET',
                url : "{{route('search.orderStatus')}}",
                data:{'orderStatus':valueDate},
                success:function(data){
                    $('tbody').empty();
                    $('tbody').html(data);
                }
            });
        });

        $('#searchDate').on('change' , function(){
            var valueDate = $(this).val();

            $.ajax({
                type : 'GET',
                url : "{{route('search.orderDate')}}",
                data:{'searchDate':valueDate},
                success:function(data){
                    $('tbody').empty();
                    $('tbody').html(data);
                }
            });
        });
    });
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
</script>
@endsection
