@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Coupons List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Coupons List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('menu.Coupon Code')}}</th>
                            <th>{{__('menu.Coupon Discount')}}</th>
                            <th>{{__('menu.Coupon Type')}}</th>
                            <th>{{__('menu.Status')}}</th>
                            <th>{{__('menu.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($coupons) > 0)
                        @foreach($coupons as $key => $coupon)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$coupon->coupon_code}}</td>
                                <td>{{$coupon->coupon_discount}}</td>
                                <td>{{$coupon->coupon_type == 1 ? 'SAR' : '%'}}</td>
                                <td>{{$coupon->coupon_validity}}</td>
                                <td>
                                    <a href="/admin/coupon/edit/{{$coupon->id}}" class="btn btn-success">{{__('menu.Edit')}}</a>
                                    <a data-swal-template="#my-templateAr{{$coupon->id}}" class="btn btn-danger" style="color:#fff;">{{__('menu.Delete')}}</a>
                                </td>
                            </tr>
                            <template id="my-templateAr{{$coupon->id}}">
                                <swal-title>
                                    هل تريد مسح  هذا الكوبون؟
                                </swal-title>
                                <swal-icon type="warning" color="red"></swal-icon>
                                <swal-button type="confirm">
                                    <a href="/admin/coupon/delete/{{$coupon->id}}" style="color:white;">حذف</a>
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
                                <tr><td colspan="5" class="text-center">{{__('menu.No Coupons Here')}}</td></tr>
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
