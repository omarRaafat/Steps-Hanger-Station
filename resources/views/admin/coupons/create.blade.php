@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Coupons')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Add Coupons')}}</li>
            </ol>
          </nav>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('menu.Add Coupons')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Coupon Code')}}</label>
                        <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Coupon_Code">
                        <div class="invalid-feedback" style="display:contents;" id="coupon_code_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Coupon Discount')}}</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input type="text" class="form-control" name="coupon_discount" id="coupon_discount" placeholder="Coupon_Discount">
                        </div>
                        <div class="invalid-feedback" style="display:contents;" id="coupon_discount_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Coupon Expiration')}}</label>

                        <input type="date" name="fromDate" class="form-control" id="fromDate" placeholder="Coupon_Expiration" />
                        <div class="invalid-feedback" style="display:contents;" id="fromDate_error"></div>
                        <br>

                        <span>{{__('menu.To')}}</span>

                        <input type="date" name="toDate" class="form-control" id="toDate" placeholder="Coupon_Expiration" />
                        <div class="invalid-feedback" style="display:contents;" id="toDate_error"></div>
                        <br>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Select Coupon Validity')}}</label>
                        <select name="coupon_validity" id="coupon_validity" class="form-control">
                            <option disabled selected value="">-- Choose Case --</option>
                            <option value="0">Disabled</option>
                            <option value="1">Active</option>
                        </select>
                        <div class="invalid-feedback" style="display:contents;" id="coupon_validity_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Select Coupon Type')}}</label>
                        <select name="coupon_type" id="coupon_type" class="form-control">
                            <option disabled selected value="">-- Choose Type --</option>
                            <option value="0">%</option>
                            <option value="1">SAR</option>
                        </select>
                        <div class="invalid-feedback" style="display:contents;" id="coupon_type_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button class="btn btn-success" type="submit">{{__('menu.Save')}}</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submitForm').submit(function(e){
            e.preventDefault();
            var coupon_code = $('#coupon_code').val();
            var coupon_discount = $('#coupon_discount').val();
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var coupon_validity = $('#coupon_validity').val();
            var coupon_type = $('#coupon_type').val();

            var formData = new FormData();
            if(coupon_validity == null){
                $('#coupon_validity_error').text('coupon_validity is required');
            }else if(coupon_type == null){
                $('#coupon_validity_error').text('');
                $('#coupon_type_error').text('coupon_type is required');
            }else{
                formData.append('coupon_code' , coupon_code);
                formData.append('coupon_discount' , coupon_discount);
                formData.append('fromDate' , fromDate);
                formData.append('toDate' , toDate);
                formData.append('coupon_validity' , coupon_validity);
                formData.append('coupon_type' , coupon_type);

                $.ajax({
                    url:"{{route('coupons.store')}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم حفظ الكوبون بنجاح !',
                            confirmButtonText: 'تم',
                            type: 'success',
                            timer:2500
                        })
                        $('#coupon_code').val('');
                        $('#coupon_discount').val('');
                        $('#fromDate').val('');
                        $('#toDate').val('');
                        $('#coupon_validity').val('');
                        $('#coupon_type').val('');

                        $('#coupon_code_error').text('');
                        $('#coupon_discount_error').text('');
                        $('#fromDate_error').text('');
                        $('#toDate_error').text('');
                        $('#coupon_validity_error').text('');
                        $('#coupon_type_error').text('');


                    },error:function(error){
                        if(error.responseJSON.errors.coupon_code){
                            $('#coupon_code_error').text(error.responseJSON.errors.coupon_code);
                        }else{
                            $('#coupon_code_error').text("");
                        }

                        if(error.responseJSON.errors.coupon_discount){
                            $('#coupon_discount_error').text(error.responseJSON.errors.coupon_discount);
                        }else{
                            $('#coupon_discount_error').text("");
                        }

                        if(error.responseJSON.errors.fromDate){
                            $('#fromDate_error').text(error.responseJSON.errors.fromDate);
                        }else{
                            $('#fromDate_error').text("");
                        }

                        if(error.responseJSON.errors.toDate){
                            $('#toDate_error').text(error.responseJSON.errors.toDate);
                        }else{
                            $('#toDate_error').text("");
                        }

                        if(error.responseJSON.errors.coupon_validity){
                            $('#coupon_validity_error').text(error.responseJSON.errors.coupon_validity);
                        }else{
                            $('#coupon_validity_error').text("");
                        }

                        if(error.responseJSON.errors.coupon_type){
                            $('#coupon_type_error').text(error.responseJSON.errors.coupon_type);
                        }else{
                            $('#coupon_type_error').text("");
                        }

                        $.each(error.responseJSON.errors, function(key,value) {

                        });
                    }
                });
            }
        });
    });
</script>
@endsection
