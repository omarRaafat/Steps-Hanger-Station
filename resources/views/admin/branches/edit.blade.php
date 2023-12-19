@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">--}}

<style>
    .daysCSS1 , .daysCSS2 , .daysCSS3 , .daysCSS4 , .daysCSS5 , .daysCSS6 , .daysCSS7{
        width: 150px;
        cursor:pointer;
    }
</style>

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Branch')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Edit Branch')}}</li>
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
              <h6>{{__('menu.Edit Branch')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-row">
                <div class="col-md-6 mb-3">
                        <label>{{__('menu.Branch Name(Arabic)')}}</label>
                        <input type="text" class="form-control" name="branch_name_ar" id="branch_name_ar" value="{{$branches->branch_name_ar}}" placeholder="Branch_Name(Arabic)">
                        <div class="invalid-feedback" style="display:contents;" id="branch_name_ar_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Branch Name(English)')}}</label>
                        <input type="text" class="form-control" name="branch_name_en" id="branch_name_en" value="{{$branches->branch_name_en}}" placeholder="Branch_Name(English)">
                        <div class="invalid-feedback" style="display:contents;" id="branch_name_en_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Branch Description(Arabic)')}}</label>
                        <textarea class="form-control" name="branch_description_ar" id="branch_description_ar" rows="5" cols="30">{{$branches->branch_description_ar}}</textarea>
                        <div class="invalid-feedback" style="display:contents;" id="branch_description_ar_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Branch Description(English)')}}</label>
                        <textarea class="form-control" name="branch_description_en" id="branch_description_en" rows="5" cols="30">{{$branches->branch_description_en}}</textarea>
                        <div class="invalid-feedback" style="display:contents;" id="branch_description_en_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Country')}}</label>
                        <select id="country" name="country" class="form-control">

                        </select>
                        <div class="invalid-feedback" style="display:contents;" id="country_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.City')}}</label>
                            <div id="state-code">
                                <input type="text" class="form-control" name="city" id="state" placeholder="City" value="{{$branches->city}}">
                            </div>
                        <div class="invalid-feedback" style="display:contents;" id="city_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Branch Location(Google Map Link)')}}</label>
                        <input type="text" class="form-control text-left" name="branch_location" id="branch_location" value="{{$branches->branch_location}}" placeholder="Google Map Link">
                        <div class="invalid-feedback" style="display:contents;" id="branch_location_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Working Hours From')}}</label>
                        <input type="time" class="form-control" name="working_hours_from" id="working_hours_from" value="{{$branches->working_hours_from}}" placeholder="Working_Hours_From">
                        <div class="invalid-feedback" style="display:contents;" id="working_hours_from_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Working Hours To')}}</label>
                        <input type="time" class="form-control" name="working_hours_to" id="working_hours_to" value="{{$branches->working_hours_to}}" placeholder="Working_Hours_To">
                        <div class="invalid-feedback" style="display:contents;" id="working_hours_to_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Wroking Days')}}</label>
                        <div class="">
                            <div class="card-body">
                                <ul class="list-group list-group-vertical ">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS1" data-value="friday" style="border:1px solid #dad7d7;"><span class="spanCSS1">FRI</span></li>
                                        </div>
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS2" data-value="thursday" style="border:1px solid #dad7d7;"><span class="spanCSS2">THU</span></li>
                                        </div>
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS3" data-value="wednesday" style="border:1px solid #dad7d7;"><span class="spanCSS3">WED</span></li>
                                        </div>
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS4" data-value="tuesday" style="border:1px solid #dad7d7;"><span class="spanCSS4">TUE</span></li>
                                        </div>
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS5" data-value="monday" style="border:1px solid #dad7d7;"><span class="spanCSS5">MON</span></li>
                                        </div>
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS6" data-value="sunday" style="border:1px solid #dad7d7;"><span class="spanCSS6">SUN</span></li>
                                        </div>
                                        <br>  <br>  <br>
                                        <div class="col-md-2">
                                            <li class="list-group-item text-center daysCSS7" data-value="saturday" style="border:1px solid #dad7d7;"><span class="spanCSS7">SAT</span></li>
                                        </div>

                                    </div>








                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="working_days" id="working_days_array" value="{{$branches->working_days}}">
                        <div class="invalid-feedback" id="working_days_error" style="display: contents;"></div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>--}}

<script src="{{url('/admin/assets/js/country-states.js')}}"></script>
<script type="application/javascript">
    $(document).ready(function(){

        var arrayText = $('#working_days_array').val();
        var dayArray = JSON.parse(arrayText);
        console.log(dayArray);

        for(var i = 0; i<dayArray.length ; i++){
            if(dayArray[i] == 1){
                $('.daysCSS1').css('background-color' , '#778cef');
                $('.spanCSS1').css('color' , '#fff');
            }else if(dayArray[i] == 2){
                $('.daysCSS2').css('background-color' , '#778cef');
                $('.spanCSS2').css('color' , '#fff');
            }else if(dayArray[i] == 3){
                $('.daysCSS3').css('background-color' , '#778cef');
                $('.spanCSS3').css('color' , '#fff');
            }else if(dayArray[i] == 4){
                $('.daysCSS4').css('background-color' , '#778cef');
                $('.spanCSS4').css('color' , '#fff');
            }else if(dayArray[i] == 5){
                $('.daysCSS5').css('background-color' , '#778cef');
                $('.spanCSS5').css('color' , '#fff');
            }else if(dayArray[i] == 6){
                $('.daysCSS6').css('background-color' , '#778cef');
                $('.spanCSS6').css('color' , '#fff');
            }else if(dayArray[i] == 7){
                $('.daysCSS7').css('background-color' , '#778cef');
                $('.spanCSS7').css('color' , '#fff');
            }else{
                $('.daysCSS1').css('background-color' , '#fff');
                $('.spanCSS1').css('color' , 'black');

                $('.daysCSS2').css('background-color' , '#fff');
                $('.spanCSS2').css('color' , 'black');

                $('.daysCSS3').css('background-color' , '#fff');
                $('.spanCSS3').css('color' , 'black');

                $('.daysCSS4').css('background-color' , '#fff');
                $('.spanCSS4').css('color' , 'black');

                $('.daysCSS5').css('background-color' , '#fff');
                $('.spanCSS5').css('color' , 'black');

                $('.daysCSS6').css('background-color' , '#fff');
                $('.spanCSS6').css('color' , 'black');

                $('.daysCSS7').css('background-color' , '#fff');
                $('.spanCSS7').css('color' , 'black');
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submitForm').submit(function(e){
            e.preventDefault();
            var branch_name_ar = $('#branch_name_ar').val();
            var branch_name_en = $('#branch_name_en').val();
            var branch_description_ar = $('#branch_description_ar').val();
            var branch_description_en = $('#branch_description_en').val();
            var country = $('#country').val();
            var city = $('#state').val();
            var branch_location = $('#branch_location').val();
            var working_hours_from = $('#working_hours_from').val();
            var working_hours_to = $('#working_hours_to').val();
            var working_days = $('#working_days_array').val();

            var formData = new FormData();

            formData.append('branch_name_ar' , branch_name_ar);
            formData.append('branch_name_en' , branch_name_en);
            formData.append('branch_description_ar' , branch_description_ar);
            formData.append('branch_description_en' , branch_description_en);
            formData.append('country' , country);
            formData.append('city' , city);
            formData.append('branch_location' , branch_location);
            formData.append('working_hours_from' , working_hours_from);
            formData.append('working_hours_to' , working_hours_to);
            formData.append('working_days' , working_days);

            $.ajax({
                url:"{{ url('admin/branches/update/' . $branches->id) }}",
                type:"POST",
                data:formData,
                processData: false,
                contentType: false,
                success:function(data){
                    Swal.fire({
                        title: 'لقد تم تعديل الفرع بنجاح !',
                        confirmButtonText: 'تم',
                        type: 'success',
                        timer:2500
                    }).then(function() {
                        window.location = "{{route('branches.index')}}";
                    });

                    $('#branch_name_ar_error').text("");
                    $('#branch_name_en_error').text("");
                    $('#branch_description_ar_error').text("");
                    $('#branch_description_en_error').text("");
                    $('#country_error').text("");
                    $('#city_error').text("");
                    $('#branch_location_error').text("");
                    $('#working_hours_from_error').text("");
                    $('#working_hours_to_error').text("");
                    $('#working_days_error').val('');

                },error:function(error){
                        if(error.responseJSON.errors.branch_name_ar){
                            $('#branch_name_ar_error').text(error.responseJSON.errors.branch_name_ar);
                        }else{
                            $('#branch_name_ar_error').text("");
                        }

                        if(error.responseJSON.errors.branch_name_en){
                            $('#branch_name_en_error').text(error.responseJSON.errors.branch_name_en)
                        }else{
                            $('#branch_name_en_error').text("");
                        }

                        if(error.responseJSON.errors.branch_description_ar){
                            $('#branch_description_ar_error').text(error.responseJSON.errors.branch_description_ar)
                        }else{
                            $('#branch_description_ar_error').text("");
                        }

                        if(error.responseJSON.errors.branch_description_en){
                            $('#branch_description_en_error').text(error.responseJSON.errors.branch_description_en)
                        }else{
                            $('#branch_description_en_error').text("");
                        }

                        if(error.responseJSON.errors.country){
                            $('#country_error').text(error.responseJSON.errors.country)
                        }else{
                            $('#country_error').text("");
                        }

                        if(error.responseJSON.errors.city){
                            $('#city_error').text(error.responseJSON.errors.city)
                        }else{
                            $('#city_error').text("");
                        }

                        if(error.responseJSON.errors.branch_location){
                            $('#branch_location_error').text(error.responseJSON.errors.branch_location)
                        }else{
                            $('#branch_location_error').text("");
                        }

                        if(error.responseJSON.errors.working_hours_from){
                            $('#working_hours_from_error').text(error.responseJSON.errors.working_hours_from)
                        }else{
                            $('#working_hours_from_error').text("");
                        }

                        if(error.responseJSON.errors.working_hours_to){
                            $('#working_hours_to_error').text(error.responseJSON.errors.working_hours_to)
                        }else{
                            $('#working_hours_to_error').text("");
                        }

                        if(error.responseJSON.errors.working_days){
                            $('#working_days_error').text(error.responseJSON.errors.working_days)
                        }else{
                            $('#working_days_error').text("");
                        }

                    $.each(error.responseJSON.errors, function(key,value) {

                    });
                }
            });
        });

        $('.daysCSS1').on('click' , function(e){
            var day1 = $('.daysCSS1').attr('data-value');
            if($('.daysCSS1').css("background-color")=="rgb(119, 140, 239)"){
                var index = dayArray.indexOf(day1);
                if (index !== -1) {
                    dayArray.splice(index, 1);
                }
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));

                $(this).css('background-color' , '#fff');
                $('.spanCSS1').css('color' , 'black');
            }else{
                dayArray.push(day1);
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));
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
                $('#working_days_array').val(JSON.stringify(dayArray));

                $(this).css('background-color' , '#fff');
                $('.spanCSS2').css('color' , 'black');
            }else{
                dayArray.push(day2);
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));
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
                $('#working_days_array').val(JSON.stringify(dayArray));

                $(this).css('background-color' , '#fff');
                $('.spanCSS3').css('color' , 'black');
            }else{
                dayArray.push(day3);
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));
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
                $('#working_days_array').val(JSON.stringify(dayArray));

                $(this).css('background-color' , '#fff');
                $('.spanCSS4').css('color' , 'black');
            }else{
                dayArray.push(day4);
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));
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
                $('#working_days_array').val(JSON.stringify(dayArray));

                $(this).css('background-color' , '#fff');
                $('.spanCSS5').css('color' , 'black');
            }else{
                dayArray.push(day5);
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));
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
                $('#working_days_array').val(JSON.stringify(dayArray));

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
                $('#working_days_array').val(JSON.stringify(dayArray));

                $(this).css('background-color' , '#fff');
                $('.spanCSS7').css('color' , 'black');
            }else{
                dayArray.push(day7);
                console.log(dayArray);
                $('#working_days_array').val(JSON.stringify(dayArray));
                $(this).css('background-color' , '#778cef');
                $('.spanCSS7').css('color' , '#fff');
            }
        });
    });

    let user_country_code = "IN";
    let country_list = country_and_states['country'];
    let states_list = country_and_states['states'];

    let option =  '';
    option += '<option>select country</option>';

    for(let country_code in country_list){
        let selected = (country_code == user_country_code) ? ' selected' : '';
        option += '<option value="'+country_code+'"'+selected+'>'+country_list[country_code]+'</option>';
    }

    document.getElementById('country').innerHTML = option;


    let text_box = '<input type="text" class="input-text form-control" id="state">';
    let state_code_id = document.getElementById("state-code");

    function create_states_dropdown() {

        let country_code = document.getElementById("country").value;
        let states = states_list[country_code];
        if(!states){
            state_code_id.innerHTML = text_box;
            return;
        }
        let option = '';
        if (states.length > 0) {
            option = '<select class="form-control" id="state">\n';
            for (let i = 0; i < states.length; i++) {
                option += '<option value="'+states[i].name+'">'+states[i].name+'</option>';
            }
            option += '</select>';
        } else {
            option = text_box
        }
        state_code_id.innerHTML = option;
    }

    const country_select = document.getElementById("country");
    country_select.addEventListener('change', create_states_dropdown);

    create_states_dropdown();
</script>
@endsection
