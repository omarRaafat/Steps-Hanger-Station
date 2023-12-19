@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
  <div class="row">

    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
          <li class="breadcrumb-item"><a href="#">{{__('menu.Invoice')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{__('menu.Invoice Details')}}</li>
        </ol>
      </nav>

      <div class="ms-panel">

        <div class="ms-panel-body">
          <div id="prinitingArea">
            <div class="ms-panel-header header-mini">
              <div class="d-flex justify-content-between">
                <h6>{{__('menu.Invoice')}} : #{{$invoices->id}}</h6>
                <h6>
                  <p>{{__('menu.Restaurant')}} : {{@App\Models\Admin::first()->username}}</p>
{{--                  <p>{{__('menu.Branch')}} : {{getBranchOfSandwich($invoices->id)}}</p>--}}
                  <p>{{__('menu.Vat Number')}} : {{@App\Models\Vat::first()->vat_number}}</p>
                </h6>
              </div>
            </div>
            <!-- Invoice To -->
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="invoice-address">
                  <h3>{{__('menu.Reciever')}}: </h3>
                  <h5>{{@App\Models\User::find($invoices->orders->user_id)->username}}</h5>
                  <p>{{@App\Models\User::find($invoices->orders->user_id)->email}}</p>
                  <p class="mb-0">{{@App\Models\User::find($invoices->orders->user_id)->address}}</p>
                  <p class="mb-0">{{@App\Models\User::find($invoices->orders->user_id)->country}}</p>
                  <p>{{@App\Models\User::find($invoices->orders->user_id)->city}}</p>
                  <p>{{__('menu.Invoice Date')}} : {{date('d-m-Y', strtotime($invoices->created_at))}}</p>
                  <p>{{__('menu.Invoice Time')}} : {{date('H:i', strtotime($invoices->created_at))}}</p>
                </div>
              </div>
              @if(Session::get('locale') == 'en')
              <div class="col-md-6 text-md-left">
                <ul class="invoice-date">
                  <li>
                    {!! QrCode::size(100)->generate("order_total_price : ".$invoices->orders->total_after_tax); !!}
                  </li>
                </ul>
              </div>
              @else
              <div class="col-md-6 text-md-right">
                <ul class="invoice-date">
                  <li>
                    {!! QrCode::size(100)->generate("order_total_price : ".$invoices->orders->total_after_tax); !!}
                  </li>
                </ul>
              </div>
              @endif
            </div>

            <!-- Invoice Table -->
            <div class="ms-invoice-table table-responsive mt-5">
              <table class="table table-hover text-right thead-light">
                <thead>
                  <tr class="text-capitalize">
                    <th class="text-center w-5">{{__('menu.Cart Id')}}</th>
                    <th class="text-left">{{__('menu.Meal')}}</th>
                    <th>{{__('menu.Qty')}}</th>
                    <th>{{__('menu.Unit Cost')}}</th>
                    <th>{{__('menu.Total')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($carts_data as $data)

                    <tr>
                      <td class="text-center">{{$data->id}}</td>
                      <td class="text-left">{{@App\Models\Menu_Meal::find($data->meal_id)->meal_name_ar}}</td>
                      <td>{{$data->quantity}}</td>
                      <td>{{$data->price}}</td>
                      <td>{{$data->total_price}}</td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
              <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                        <td>{{__('menu.INVOICE SUBTOTAL')}}</td>
                        <td>{{getTotalOrder($invoices->id)}} SAR</td>
                    </tr>
                    <tr>
                        <td>{{__('menu.VAT')}} ({{@App\Models\Invoice::find($invoices->id)->vat}} %)</td>
                        <td>{{((@App\Models\Invoice::find($invoices->id)->vat/100) * getTotalOrder($invoices->id))}} SAR </td>
                    </tr>
                    <tr>
                        <td>{{__('menu.INVOICE TOTAL')}}</td>
                        <td><b>{{$invoices->orders->total_after_tax}}</b> {{__('menu.SAR')}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="invoice-buttons text-right">
              <!-- Example single danger button -->
              <div class="btn-group">
                  @if($invoices->orders->status == 3)
                      <button type="button" class="btn btn-success " disabled>
                          {{$invoices->orders->status()}}
                      </button>
                      @else
                  @if($invoices->orders->status == 0)
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{$invoices->orders->status()}}
                      </button>
                  @elseif($invoices->orders->status == 1)
                      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{$invoices->orders->status()}}
                      </button>
                  @elseif($invoices->orders->status == 2)
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{$invoices->orders->status()}}
                      </button>
                  @elseif($invoices->orders->status == 3)
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{$invoices->orders->status()}}
                      </button>
                  @else
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{$invoices->orders->status()}}
                      </button>
                  @endif
@endif
                  <div class="dropdown-menu">
                      @if($invoices->orders->status != 3)
                          <p style="color: silver;padding-left: 15px;">change order status</p>
                          <div class="dropdown-divider"></div>
                      @if($invoices->orders->status != 1)
                      <a class="dropdown-item" href="{{url('/admin/dashboard/order/status/1/'.$invoices->orders->id)}}" >{{__("menu.Preparing")}}</a>
                      @endif
                          @if($invoices->orders->status != 2)
                      <a class="dropdown-item" href="{{url('/admin/dashboard/order/status/2/'.$invoices->orders->id)}}">{{__("menu.Ready")}}</a>
                          @endif
                      @if($invoices->orders->status != 3)
                      <a class="dropdown-item" href="{{url('/admin/dashboard/order/status/3/'.$invoices->orders->id)}}">{{ __("menu.Delivered")}}</a>
                              @endif

                             @if($invoices->orders->status != 4)
                      <a class="dropdown-item" href="{{url('/admin/dashboard/order/status/4/'.$invoices->orders->id)}}">{{__("menu.Cancel")}}</a>
                          @endif

                          @endif
                  </div>
              </div>
            <button onclick="printDiv('prinitingArea')" class="btn btn-primary mr-2">{{__('menu.Print Invoice')}}</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
  $(document).ready(function(){

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
