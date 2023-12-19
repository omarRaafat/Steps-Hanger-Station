@extends('layouts.admin_container')
@section('content')
  <!-- Main Content -->
<style>
    .leading-5{
        padding: 20px
    ;
    }
</style>

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                <li class="breadcrumb-item"><a href="#">{{__('menu.Orders')}}</a></li>

            </ol>
          </nav>




          <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Orders')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive">
                  <table class="table table-hover thead-primary">
                    <thead>
                      <tr>
                        <th scope="col">{{__('menu.Order ID')}}</th>

                        <th scope="col">{{__('menu.Phone')}}</th>

                          <th scope="col">{{__('menu.Order Status')}}</th>
                            <th scope="col">{{__('menu.Order Time')}}</th>
                            <th scope="col">{{__('menu.Price')}}</th>
                          <th>{{__('menu.Actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if($orders->count() > 0)
                    @foreach($orders as $order)
                      <tr>
                        <td scope="row"># {{$order->id}} </td>

                        <td> {{$order->user->phone}}</td>

                        <td>
                            @if($order->status == 0)
                                <span class="badge badge-primary" style="padding: 15px">{{$order->status()}}</span>
                            @elseif($order->status == 1)
                                <span class="badge badge-secondary" style="padding: 15px">{{$order->status()}}</span>
                            @elseif($order->status == 2)
                                <span class="badge badge-warning" style="padding: 15px">{{$order->status()}}</span>
                            @elseif($order->status == 3)
                                <span class="badge badge-success" style="padding: 15px">{{$order->status()}}</span>
                            @else
                                <span class="badge badge-danger" style="padding: 15px">{{$order->status()}}</span>
                            @endif
                        </td>
                          <td>{{$order->date}}</td>
                            <td>{{$order->total_after_tax}} SAR</td>
                          <td ><a class="btn btn-primary" href="/admin/dashboard/order/invoice/{{$order->id}}" >{{__('menu.show')}}</a> </td>
                      </tr>

                    @endforeach
                    @else
                      <tbody>
                      <th ><td class=" text-center">NO ORDERS HAS BEEND SENT YET</td></th>
                      </tbody>
@endif

                    </tbody>
                  </table>

                </div>


              </div>
                <div class="container text-center">
                    {{ $orders->links() }}
                </div>
            </div>
          </div>


        </div>

      </div>
    </div>












@endsection
