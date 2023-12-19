@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Loyality')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Edit Loyality')}}</li>
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
              <h6>{{__('menu.Edit loyality')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Loyality Orders Number')}}</label>
                        <input type="text" class="form-control" name="loyality_No" value="{{$presents->loyality_No}}" id="loyality_No" placeholder="Enter Loyality Orders Number">
                        <div class="invalid-feedback" style="display:contents;" id="loyality_No_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Choose Icons')}}</label>
                        <div class="row">
                            <div class="col-md-2">
                                @if($presents->icon == 'fa fa-hamburger')
                                    <div id="hamburger" style="width:100px;cursor:pointer;color:green;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-hamburger fa-3x"></i></div>
                                @else
                                    <div id="hamburger" style="width:100px;cursor:pointer;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-hamburger fa-3x"></i></div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if($presents->icon == 'fa fa-pizza-slice')
                                    <div id="pizza" style="width:100px;cursor:pointer;color:green;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-pizza-slice fa-3x"></i></div>
                                @else
                                    <div id="pizza" style="width:100px;cursor:pointer;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-pizza-slice fa-3x"></i></div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if($presents->icon == 'fa fa-mug-hot')
                                    <div id="mug" style="width:100px;cursor:pointer;color:green;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-mug-hot fa-3x"></i></div>
                                @else
                                    <div id="mug" style="width:100px;cursor:pointer;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-mug-hot fa-3x"></i></div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if($presents->icon == 'fa fa-gift')
                                    <div id="gift" style="width:100px;cursor:pointer;color:green;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-gift fa-3x"></i></div>
                                @else
                                    <div id="gift" style="width:100px;cursor:pointer;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-gift fa-3x"></i></div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if($presents->icon == 'fa fa-heart')
                                    <div id="heart" style="width:100px;cursor:pointer;color:green;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-heart fa-3x"></i></div>
                                @else
                                    <div id="heart" style="width:100px;cursor:pointer;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-heart fa-3x"></i></div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if($presents->icon == 'fa fa-star')
                                    <div id="star" style="width:100px;cursor:pointer;color:green;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-star fa-3x"></i></div>
                                @else
                                    <div id="star" style="width:100px;cursor:pointer;padding:25px;border:2px solid #eee;box-shadow:2px 2px 6px 0px rgb(189, 212, 230 , 1);"><i class="fa fa-star fa-3x"></i></div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div>
                            <input type="hidden" name="icon" value="{{$presents->icon}}" id="icon" class="form-control social-icon">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Coupon Discount')}}</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input type="text" name="coupon_discount" id="coupon_discount" class="form-control" value="{{$presents->coupon_discount}}" placeholder="Coupon Discount">
                        </div>
                        <div class="invalid-feedback" style="display:contents;" id="coupon_discount_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button class="btn btn-success" type="submit">{{__('menu.Update')}}</button>
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
        $('.generateCode').click(function(e){
            e.preventDefault();
            $('#coupon_code').val(makeid(10));
        });

        $('#hamburger').on('click' , function(){
            $('.social-icon').val('fa fa-hamburger');
            $('#hamburger').css({
                'color' : 'green',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#gift').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#heart').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#pizza').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#mug').css({
                'color' : '',
                'color' : '',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#star').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
        });

        $('#pizza').on('click' , function(){
            $('.social-icon').val('fa fa-pizza-slice');
            $('#pizza').css({
                'color' : 'green',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#heart').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#mug').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#hamburger').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#star').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#gift').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
        });

        $('#mug').on('click' , function(){
            $('.social-icon').val('fa fa-mug-hot');
            $('#mug').css({
                'color' : 'green',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#heart').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#pizza').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#hamburger').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#star').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#gift').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
        });

        $('#heart').on('click' , function(){
            $('.social-icon').val('fa fa-heart');
            $('#heart').css({
                'color' : 'green',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#gift').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#hamburger').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#pizza').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#mug').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#star').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
        });

        $('#star').on('click' , function(){
            $('.social-icon').val('fa fa-star');
            $('#star').css({
                'color' : 'green',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#heart').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#gift').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#hamburger').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#pizza').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#mug').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
        });

        $('#gift').on('click' , function(){
            $('.social-icon').val('fa fa-gift');
            $('#gift').css({
                'color' : 'green',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#heart').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#pizza').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#hamburger').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#mug').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
            $('#star').css({
                'color' : '',
                'color' : '',
                'padding' : '25px',
                'width' : '100px',
                'cursor' : 'pointer',
                'border': '2px solid #eee',
                'box-shadow' : '2px 2px 6px 0px rgb(189, 212, 230 , 1)'
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submitForm').submit(function(e){
            e.preventDefault();
            var loyality_No = $('#loyality_No').val();
            var icon = $('#icon').val();
            var coupon_discount = $('#coupon_discount').val();

            var formData = new FormData();

            formData.append('loyality_No' , loyality_No);
            formData.append('icon' , icon);
            formData.append('coupon_discount' , coupon_discount);

            $.ajax({
                url:"{{ url('admin/loyality/update/' . $presents->id) }}",
                type:"POST",
                data:formData,
                processData: false,
                contentType: false,
                success:function(data){
                    Swal.fire({
                        title: 'لقد تم تعديل الهدية بنجاح !',
                        confirmButtonText: 'تم',
                        type: 'success',
                        timer:2500
                    }).then(function() {
                        window.location = "{{route('loyality.index')}}";
                    });

                    $('#loyality_No_error').text("");
                    $('#coupon_discount_error').text("");

                },error:function(error){
                    if(error.responseJSON.errors.loyality_No){
                        $('#loyality_No_error').text(error.responseJSON.errors.loyality_No)
                    }else{
                        $('#loyality_No_error').text("");
                    }

                    if(error.responseJSON.errors.coupon_discount){
                        $('#coupon_discount_error').text(error.responseJSON.errors.coupon_discount)
                    }else{
                        $('#coupon_discount_error').text("");
                    }

                    $.each(error.responseJSON.errors, function(key,value) {

                    });
                }
            });
        });
    });

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
    return result;
    }
</script>
@endsection
