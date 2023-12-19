@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Invoice List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Invoice List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                    <thead>
                      <tr>
                        <th scope="col">{{__('menu.Invoice ID')}}</th>
                        <th scope="col">{{__('menu.Order Id')}}</th>
                        <th scope="col">{{__('menu.Invoice Date')}}</th>
                        <th scope="col">{{__('menu.Total Bill')}}</th>
                        <th scope="col">{{__('menu.Actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(count($invoices) > 0)
                        @foreach($invoices as $key => $invoice)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$invoice->order_id}}</td>
                            <td>{{date('d-m-Y', strtotime($invoice->created_at))}}</td>
                            <!-- <td>

                                // $afetr_decode = json_decode($invoice->orders->cart_ids);
                                // foreach($afetr_decode as $decode){
                                //   $quantity = \App\Models\Cart::where('id' , '=' , $decode)->sum('quantity');
                                //   echo $quantity;
                                // }

                            </td> -->
                            <td><span class="text-danger" style="font-size: 10px;">{{__('menu.SAR')}}</span> {{$invoice->orders->total_after_tax}}</td>
                            <td>
                                <a href="/admin/invoices/show/{{$invoice->id}}" class="btn btn-success">{{__('menu.Show')}}</a>
                                <a data-swal-template="#my-templateAr{{$invoice->id}}" class="btn btn-danger" style="color:#fff;">{{__('menu.Delete')}}</a>
                            </td>
                        </tr>
                        <template id="my-templateAr{{$invoice->id}}">
                            <swal-title>
                                هل تريد مسح  هذه الفاتورة؟
                            </swal-title>
                            <swal-icon type="warning" color="red"></swal-icon>
                            <swal-button type="confirm">
                                <a href="/admin/invoices/delete/{{$invoice->id}}" style="color:white;">حذف</a>
                            </swal-button>
                            <swal-button type="cancel">
                                إلغاء
                            </swal-button>
                            <swal-param name="allowEscapeKey" value="false" />
                            <swal-param
                                name="customClass"
                                value='{ "popup": "my-popup" }' />
                        </template>
                        @endforeach
                        @else
                            <tr><td colspan="5" class="text-center">{{__('menu.No Invoices Here')}}</td></tr>
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
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="application/javascript">
      Swal.bindClickHandler()

      Swal.mixin({
      modal: true,
      confirmButtonColor: '#f9423c',
      }).bindClickHandler('data-swal-template')
  </script>
@endsection
