@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .daysCSS1 , .daysCSS2 , .daysCSS3 , .daysCSS4 , .daysCSS5 , .daysCSS6 , .daysCSS7{
            width: 150px;
            cursor:pointer;
        }
    </style>
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
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Restaurant General Info')}}</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form id="res_general_info" action="{{route('settings_3')}}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.restaurant Name(Arabic)')}}</label>
                                        <input type="text" class="form-control" name="restaurant_name_ar" value="{{$settings->restaurant_name_ar}}" id="restaurant_name_ar" placeholder="restaurant_Name(Arabic)">
                                        <div class="invalid-feedback" id="restaurant_name_ar_error" style="display: contents;"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.restaurant Name(English)')}}</label>
                                        <input type="text" class="form-control" name="restaurant_name_en"  value="{{$settings->restaurant_name_en}}" id="restaurant_name_en" placeholder="restaurant_Name(English)">
                                        <div class="invalid-feedback" id="restaurant_name_en_error" style="display: contents;"></div>
                                    </div>

                                         <div class="col-md-6 mb-3">
                                             <label>{{__('menu.restaurant Description(Arabic)')}}</label>
                                             <textarea name="restaurant_description_ar" dir="right" class="form-control"  id="restaurant_description_ar" cols="30" rows="5" style="resize: none;direction: rtl;" required>{{$settings->restaurant_description_ar}}</textarea>
                                             <div class="invalid-feedback" id="restaurant_description_ar_error" style="display: contents;"></div>
                                         </div>

                                         <div class="col-md-6 mb-3">
                                             <label>{{__('menu.restaurant Description(English)')}}</label>
                                             <textarea name="restaurant_description_en" dir="left" class="form-control"  id="restaurant_description_en" cols="30" rows="5" style="resize: none;direction: ltr;" required>{{$settings->restaurant_description_en}}</textarea>
                                             <div class="invalid-feedback" id="restaurant_description_en_error" style="display: contents;"></div>
                                         </div>

                                    <div class="col-md-12 mb-3">
                                        <label>{{__('menu.Section Image')}}</label>
                                        <img src="{{url($settings->about_image?$settings->about_image:'')}}" alt="restaurant image not uploaded yet" id="output_{{$settings->id}}" width="300" height="300" class="">

                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>{{__('menu.Change Image')}}</label>
                                        <input type="file" class="form-control" id="imgInp"  onchange="loadFile2(event,{{$settings->id}})"  name="about_image"  >

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="application/javascript">
        $(document).ready(function(){
            var dayArray = [];

            $('.daysCSS1').on('click' , function(e){
                var day1 = $('.daysCSS1').attr('data-value');
                if($('.daysCSS1').css("background-color")=="rgb(119, 140, 239)"){
                    var index = dayArray.indexOf(day1);
                    if (index !== -1) {
                        dayArray.splice(index, 1);
                    }
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS1').css('color' , 'black');
                }else{
                    dayArray.push(day1);
                    console.log(dayArray);
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
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS2').css('color' , 'black');
                }else{
                    dayArray.push(day2);
                    console.log(dayArray);
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
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS3').css('color' , 'black');
                }else{
                    dayArray.push(day3);
                    console.log(dayArray);
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
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS4').css('color' , 'black');
                }else{
                    dayArray.push(day4);
                    console.log(dayArray);
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
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS5').css('color' , 'black');
                }else{
                    dayArray.push(day5);
                    console.log(dayArray);
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
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS6').css('color' , 'black');
                }else{
                    dayArray.push(day6);
                    console.log(dayArray);
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
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);

                    $(this).css('background-color' , '#fff');
                    $('.spanCSS7').css('color' , 'black');
                }else{
                    dayArray.push(day7);
                    console.log(dayArray);
                    $('#working_days_array').val(dayArray);
                    $(this).css('background-color' , '#778cef');
                    $('.spanCSS7').css('color' , '#fff');
                }
            });


        });


    </script>
@endsection
