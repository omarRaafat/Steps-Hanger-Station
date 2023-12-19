@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->


    <div class="ms-content-wrapper ">
        <div class="row">




            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{__('menu.Settings')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('menu.Update Settings')}}</li>
                    </ol>
                </nav>
            </div>

                <div class="row">
                    <form id="submitForm" method="POST"  action="{{route('settings_2')}}" enctype="multipart/form-data" class="d-flex">
                        @csrf

                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Restaurant Contact Info')}}</h6>
                            </div>
                            <div class="ms-panel-body">
                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.E-mail')}}</label>
                                        <input type="text" class="form-control" name="email" value="{{$settings->email}}" id="quantity" placeholder="Enter restaurant_Quantity">
                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.phone')}}</label>
                                        <input type="text" class="form-control" name="phone" value="{{$settings->phone}}" id="quantity" placeholder="Enter restaurant_Quantity">
                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.Facebook')}}</label>
                                        <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}" id="quantity" placeholder="Enter restaurant_Quantity">
                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.Instagram')}}</label>
                                        <input type="text" class="form-control" name="instagram" value="{{$settings->instagram}}" id="quantity" placeholder="Enter restaurant_Quantity">
                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.Twitter')}}</label>
                                        <input type="text" class="form-control" name="twitter" value="{{$settings->twitter}}" id="quantity" placeholder="Enter restaurant_Quantity">
                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.Youtube')}}</label>
                                        <input type="text" class="form-control" name="youtube" value="{{$settings->youtube}}" id="quantity" placeholder="Enter restaurant_Quantity">
                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>
                                    </div>



                                </div>
                                <div class="col-md-12 ms-panel-header new">
                                    <button class="btn btn-success btn-block" type="submit">{{__('menu.UPDATE')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>





        </div>
    </div>

@endsection
