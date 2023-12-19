@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">--}}

    <style>
        .daysCSS1 , .daysCSS2 , .daysCSS3 , .daysCSS4 , .daysCSS5 , .daysCSS6 , .daysCSS7{
            width: 150px;
            cursor:pointer;
        }
    </style>
    <div class="ms-content-wrapper  ">
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
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Restaurant General Info')}}</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form id="res_general_info" action="{{route('settings_1')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
<input type="hidden" name="opening_days" id="working_days">
                                <div class="form-row">





                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.restaurant location(Arabic)')}}</label>
                                        <div class="input-group-prepend">

                                            <input type="text" class="form-control" name="location_ar"  value="{{$settings->location_ar}}" id="restaurant_review" placeholder="restaurant_location">
                                        </div>
                                        <div class="invalid-feedback" id="restaurant_price_error" style="display: contents;"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.restaurant location(English)')}}</label>
                                        <div class="input-group-prepend">

                                            <input type="text" class="form-control" name="location_en"  value="{{$settings->location_en}}" id="restaurant_review" placeholder="restaurant_location">
                                        </div>
                                        <div class="invalid-feedback" id="quantity_type_error" style="display: contents;"></div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>{{__('menu.Wroking Days')}}</label>
                                        <div class="">
                                            <div class="card-body">
                                                <ul class="list-group list-group-horizontal row">

                                                    <div class="row">

                                                            <li class="list-group-item text-center daysCSS1" data-value="FRI" style="border:1px solid #dad7d7;@if(in_array('FRI',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS1" style="@if(in_array('FRI',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.FRI')}}</span></li>

                                                            <li class="list-group-item text-center daysCSS2" data-value="THU" style="border:1px solid #dad7d7;@if(in_array('THU',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS2" style="@if(in_array('THU',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.THU')}}</span></li>

                                                            <li class="list-group-item text-center daysCSS3" data-value="WED" style="border:1px solid #dad7d7;@if(in_array('WED',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS3" style="@if(in_array('WED',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.WED')}}</span></li>

                                                            <li class="list-group-item text-center daysCSS4" data-value="TUE" style="border:1px solid #dad7d7;@if(in_array('TUE',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS4" style="@if(in_array('TUE',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.TUE')}}</span></li>

                                                            <li class="list-group-item text-center daysCSS5" data-value="MON" style="border:1px solid #dad7d7;@if(in_array('MON',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS5" style="@if(in_array('MON',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.MON')}}</span></li>

                                                            <li class="list-group-item text-center daysCSS6" data-value="SUN" style="border:1px solid #dad7d7;@if(in_array('SUN',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS6" style="@if(in_array('SUN',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.SUN')}}</span></li>



                                                            <li class="list-group-item text-center daysCSS7" data-value="SAT" style="border:1px solid #dad7d7;@if(in_array('SAT',json_decode($settings->opening_days))) background-color: #778cef @endif"><span class="spanCSS7" style="@if(in_array('SAT',json_decode($settings->opening_days))) color: #fff @endif">{{__('menu.SAT')}}</span></li>


                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
{{--                                        {{$settings->opening_days}}--}}
                                        <input type="hidden" name="opening_days" value="{{$settings->opening_days}}" id="working_days_array">
                                        <div class="invalid-feedback" id="working_days_error" style="display: contents;"></div>
                                    </div>
{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <label>{{__('menu.restaurant Working days')}}</label>--}}
{{--                                        <textarea name="opening_days" dir="left" class="form-control" id="restaurant_description_en" cols="30" rows="5" style="resize: none;direction: ltr;">{{$settings->opening_days}}</textarea>--}}
{{--                                        <div class="invalid-feedback" id="restaurant_description_en_error" style="display: contents;"></div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <label>{{__('menu.restaurant Working Hours')}}</label>--}}
{{--                                        <textarea name="opening_hours" dir="left" class="form-control" id="restaurant_description_en" cols="30" rows="5" style="resize: none;direction: ltr;">{{$settings->opening_hours}}</textarea>--}}
{{--                                        <div class="invalid-feedback" id="restaurant_description_en_error" style="display: contents;"></div>--}}
{{--                                    </div>--}}



                                    <div class="col-md-6 imageHere">
                                        <label>{{__('menu.restaurant Theme Color')}}</label>
                                        <div>
                                            <input type="color" accept="image/png , image/jpg , image/jpeg" name="theme_colour" value="{{$settings->theme_colour}}" id="imgInp"  class="form-control">
                                            <div class="invalid-feedback" id="restaurant_image_error" style="display: contents;"></div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 imageHere">
                                        <label>{{__('menu.restaurant Text Color (FONT)')}}</label>
                                        <div>
                                            <input type="color" accept="image/png , image/jpg , image/jpeg" name="text_colour" value="{{$settings->text_colour}}" id="imgInp"  class="form-control">
                                            <div class="invalid-feedback" id="restaurant_image_error" style="display: contents;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 imageHere">
                                        <label>{{__('menu.restaurant Logo')}}</label>
                                        <div>
                                            <input type="file" accept="image/*" name="logo"  id="imgInp"  class="form-control">
                                            <div class="invalid-feedback" id="restaurant_image_error" style="display: contents;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 imageHere">
                                        <label>{{__('menu.restaurant icon')}}</label>
                                        <div>
                                            <input type="file" accept="image/*" name="icon"  id="imgInp"  class="form-control">
                                            <div class="invalid-feedback" id="restaurant_image_error" style="display: contents;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 imageHere">
                                        <label>{{__('menu.restaurant header Logo')}}</label>
                                        <div>
                                            <input type="file" accept="image/*" name="header_logo"  id="imgInp"  class="form-control">
                                            <div class="invalid-feedback" id="restaurant_image_error" style="display: contents;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 imageHere">
                                        <label>{{__('menu.restaurant footer Logo')}}</label>
                                        <div>
                                            <input type="file" accept="image/*" name="footer_logo"  id="imgInp"  class="form-control">
                                            <div class="invalid-feedback" id="restaurant_image_error" style="display: contents;"></div>
                                        </div>
                                    </div>

                                </div>
                                    <div class="col-md-12 ms-panel-header new">
                                        <input type="submit" class="btn btn-success btn-block" value="UPDATE" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    </div>





        </div>
    </div>
    <script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>--}}
    <script type="application/javascript">
        $(document).ready(function(){
 var returned_days = <?php echo $settings->opening_days ?>;

            var dayArray = [];
for (i = 0; i<returned_days.length; i++)
    dayArray.push(returned_days[i]);
            $('.daysCSS1').on('click' , function(e){
                var day1 = $('.daysCSS1').attr('data-value');

                if($('.daysCSS1').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day1);

                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }


                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS1').css('color' , 'black');

                }else{
                    dayArray.push(day1);

                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS1').css('color' , '#fff');
                  
                }
            });

            $('.daysCSS2').on('click' , function(){
                var day2 = $('.daysCSS2').attr('data-value');
                if($('.daysCSS2').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day2);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }

                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS2').css('color' , 'black');
                }else{
                    dayArray.push(day2);

                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS2').css('color' , '#fff');
                }
            });

            $('.daysCSS3').on('click' , function(){
                var day3 = $('.daysCSS3').attr('data-value');
                if($('.daysCSS3').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day3);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }

                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS3').css('color' , 'black');
                }else{
                    dayArray.push(day3);

                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS3').css('color' , '#fff');
                }
            });

            $('.daysCSS4').on('click' , function(){
                var day4 = $('.daysCSS4').attr('data-value');
                if($('.daysCSS4').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day4);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }

                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS4').css('color' , 'black');
                }else{
                    dayArray.push(day4);

                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS4').css('color' , '#fff');
                }
            });

            $('.daysCSS5').on('click' , function(){
                var day5 = $('.daysCSS5').attr('data-value');
                if($('.daysCSS5').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day5);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }

                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS5').css('color' , 'black');
                }else{
                    dayArray.push(day5);

                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS5').css('color' , '#fff');
                }
            });

            $('.daysCSS6').on('click' , function(){
                var day6 = $('.daysCSS6').attr('data-value');
                if($('.daysCSS6').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day6);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }

                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS6').css('color' , 'black');
                }else{
                    dayArray.push(day6);

                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS6').css('color' , '#fff');
                }
            });

            $('.daysCSS7').on('click' , function(){
                var day7 = $('.daysCSS7').attr('data-value');
                if($('.daysCSS7').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day7);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }

                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS7').css('color' , 'black');
                }else{
                    dayArray.push(day7);

                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS7').css('color' , '#fff');
                }
            });


        });


    </script>
@endsection
