@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb" class="new">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
{{--              <li class="breadcrumb-item"><a href="#">{{__('menu.Menu Meal')}}</a></li>--}}
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Menu Meal List')}}</li>
            </ol>
              <a data-toggle="modal" href="#myModal" id="gen_qr_btn" style="color: gainsboro" onclick="generateQR('M9 0L9 1L8 1L8 2L9 2L9 3L8 3L8 4L10 4L10 7L11 7L11 4L12 4L12 5L13 5L13 6L12 6L12 9L14 9L14 8L13 8L13 6L14 6L14 7L15 7L15 6L16 6L16 7L17 7L17 4L16 4L16 3L17 3L17 1L15 1L15 4L14 4L14 3L13 3L13 4L12 4L12 2L13 2L13 1L11 1L11 2L10 2L10 0ZM10 3L10 4L11 4L11 3ZM15 4L15 5L14 5L14 6L15 6L15 5L16 5L16 4ZM8 5L8 7L9 7L9 5ZM0 8L0 10L1 10L1 9L3 9L3 10L2 10L2 11L1 11L1 12L5 12L5 13L2 13L2 14L3 14L3 15L2 15L2 17L3 17L3 15L4 15L4 16L5 16L5 17L8 17L8 19L9 19L9 20L8 20L8 25L11 25L11 24L10 24L10 22L9 22L9 20L10 20L10 21L12 21L12 24L13 24L13 25L14 25L14 24L13 24L13 21L14 21L14 22L15 22L15 23L16 23L16 24L17 24L17 25L18 25L18 23L20 23L20 22L21 22L21 19L24 19L24 20L25 20L25 18L22 18L22 17L24 17L24 15L25 15L25 14L24 14L24 13L25 13L25 12L24 12L24 13L23 13L23 12L20 12L20 11L19 11L19 10L20 10L20 8L19 8L19 10L18 10L18 11L17 11L17 9L18 9L18 8L17 8L17 9L16 9L16 8L15 8L15 9L16 9L16 10L15 10L15 12L16 12L16 11L17 11L17 13L16 13L16 14L15 14L15 13L14 13L14 12L13 12L13 13L12 13L12 11L13 11L13 10L11 10L11 11L10 11L10 9L11 9L11 8L6 8L6 9L7 9L7 10L5 10L5 8ZM21 8L21 9L22 9L22 8ZM23 8L23 9L24 9L24 8ZM4 10L4 11L5 11L5 12L9 12L9 10L7 10L7 11L5 11L5 10ZM21 10L21 11L22 11L22 10ZM23 10L23 11L25 11L25 10ZM10 12L10 13L5 13L5 14L4 14L4 15L5 15L5 16L8 16L8 17L9 17L9 19L10 19L10 20L11 20L11 19L10 19L10 17L11 17L11 18L13 18L13 19L12 19L12 20L14 20L14 21L15 21L15 20L16 20L16 17L15 17L15 16L18 16L18 15L19 15L19 13L17 13L17 14L16 14L16 15L15 15L15 14L14 14L14 13L13 13L13 14L12 14L12 13L11 13L11 12ZM0 13L0 17L1 17L1 13ZM10 13L10 16L9 16L9 17L10 17L10 16L11 16L11 13ZM20 13L20 14L21 14L21 17L22 17L22 16L23 16L23 13ZM6 14L6 15L9 15L9 14ZM17 14L17 15L18 15L18 14ZM12 15L12 17L14 17L14 20L15 20L15 17L14 17L14 16L15 16L15 15L14 15L14 16L13 16L13 15ZM17 17L17 20L20 20L20 17ZM18 18L18 19L19 19L19 18ZM16 21L16 23L17 23L17 21ZM19 21L19 22L20 22L20 21ZM22 21L22 23L23 23L23 22L24 22L24 24L22 24L22 25L25 25L25 21ZM19 24L19 25L20 25L20 24ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM18 0L18 7L25 7L25 0ZM19 1L19 6L24 6L24 1ZM20 2L20 5L23 5L23 2ZM0 18L0 25L7 25L7 18ZM1 19L1 24L6 24L6 19ZM2 20L2 23L5 23L5 20Z')" class="btn grid-btn mt-0 btn-lg btn-primary ">{{__('menu.MENU QR CODE')}}</a>
          </nav>

          <div class="container-fluid">
            <div class="row">
                @if(count($meals) > 0)
                @foreach($meals as $meal)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ms-card">
                            <div class="ms-card-img">
                                @if(count($meal->images) > 0)
                                <img src="{{$meal->meal_image}}" style="object-fit:cover;height:157px;width:300px;" alt="card_img">
                                @else
                                <img src="https://via.placeholder.com/565x375" style="object-fit:cover;height:157px;width:300px;" alt="card_img">
                                @endif
                            </div>
                            <div class="ms-card-body">
                                <div class="new">
                                    <h6 class="mb-0">{{Str::limit($meal->meal_name_ar , 12)}} </h6>
                                    <h6 class="ms-text-primary mb-0">{{__('menu.SAR')}} {{$meal->meal_price}}</h6>
                                </div>
                                <div class="new meta">
                                    <p>{{__('menu.Qty')}}: {{$meal->quantity}} </p>
                                    @if($meal->quantity == '∞' || $meal->quantity > 0)
                                        <span class="badge badge-success">{{__('menu.In Stock')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{__('menu.Out of Stock')}}</span>
                                    @endif
                                </div>
                                <p>{{Str::limit($meal->meal_description_ar , 40)}}</p>
                                <div class="new mb-0">
                                    <a href="/admin/menu/meal/edit/{{$meal->id}}" class="btn grid-btn mt-0 btn-sm btn-secondary">{{__('menu.Edit')}}</a>
                                    <a data-swal-template="#my-templateAr{{$meal->id}}" class="btn grid-btn mt-0 btn-sm btn-primary" style="color:#fff;">{{__('menu.Remove')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template id="my-templateAr{{$meal->id}}">
                        <swal-title>
                            هل تريد مسح  هذه الوجبة؟
                        </swal-title>
                        <swal-icon type="warning" color="red"></swal-icon>
                        <swal-button type="confirm">
                            <a href="/admin/menu/meal/delete/{{$meal->id}}" style="color:white;">حذف</a>
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
                    <h3 class="text-center text-center">{{__('menu.There is no meals yet')}}</h3>
                @endif

                    <div class="modal fade center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">{{__('menu.MENU QR CODE')}}</h4>
                                </div>
                                <div class="modal-body text-center">
                                  <img src="{{url('/uploads/qrcode.svg')}}">



                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">{{__('menu.Close')}}</button>
                                    <a href="{{('/uploads/qrcode.svg')}}" type="button" class="btn btn-primary" download>{{__('menu.DOWNLOAD')}}</a>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

            </div>
          </div>
        </div>
    <div>
<div>
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="application/javascript">
      Swal.bindClickHandler()

      Swal.mixin({
      modal: true,
      confirmButtonColor: '#f9423c',
      }).bindClickHandler('data-swal-template')
  </script>
@endsection
