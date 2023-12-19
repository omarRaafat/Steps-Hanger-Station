@extends('layouts.admin_container')
@section('content')

  <!-- Main Content -->

    <!-- Navigation Bar -->
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
          <div class="row">

            <div class="col-md-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                  <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('menu.Sales')}}</li>
                </ol>
              </nav>
            </div>

        <div class="col-12">
          <div id="prinitingArea">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Restaurant Sale')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover w-100">
                    <thead>
                      <tr>
                        <th>{{__('menu.Product ID')}}</th>
                        <th>{{__('menu.Product Name')}}</th>
                        <th>{{__('menu.Orders')}}</th>
                        <th>{{__('menu.Price')}}</th>
                        <th>{{__('menu.Status')}}</th>
                        <th>{{__('menu.Total Price')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($sales as $sale)
                        <tr>
                          <td>{{$sale->menuID}}</td>
                          <td>{{$sale->meal_name_ar}}</td>
                          <td>{{$sale->quantity}}</td>
                          <td>{{$sale->meal_price}}</td>
                          @if($sale->status == 1)
                          <td>{{__('menu.In Stock')}}</td>
                          @else
                          <td>{{__('menu.Out Of Stock')}}</td>
                          @endif
                          <td>{{$sale->total_price}}</td>
                        </tr>
                      @endforeach
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
        <button onclick="printDiv('prinitingArea')" class="btn btn-primary">{{__('menu.Print Sales Data')}}</button>
      </div>
    </div>
</div>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>

@endsection
