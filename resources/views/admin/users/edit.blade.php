@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Users')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Edit Users')}}</li>
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
              <h6>{{__('menu.Edit Users')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Username')}}</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{$users->username}}" placeholder="Username">
                        <div class="invalid-feedback" style="display:contents;" id="username_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.E-mail')}}</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$users->email}}" placeholder="E-mail">
                        <div class="invalid-feedback" style="display:contents;" id="email_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Password')}}</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="invalid-feedback" style="display:contents;" id="password_error"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>{{__('menu.Phone')}}</label>
                        <input type="number" class="form-control text-left" name="phone" id="phone" value="{{$users->phone}}" placeholder="Phone">
                        <div class="invalid-feedback" style="display:contents;" id="phone_error"></div>
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
                                <input type="text" class="form-control" name="city" id="state" placeholder="City" value="{{$users->city}}">
                            </div>
                        <div class="invalid-feedback" style="display:contents;" id="city_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Address')}}</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$users->address}}" placeholder="Address">
                        <div class="invalid-feedback" style="display:contents;" id="address_error"></div>
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
<script src="{{url('/admin/assets/js/country-states.js')}}"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submitForm').submit(function(e){
            e.preventDefault();
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var city = $('#state').val();
            var country = $('#country').val();

            var formData = new FormData();

            formData.append('username' , username);
            formData.append('email' , email);
            formData.append('password' , password);
            formData.append('phone' , phone);
            formData.append('address' , address);
            formData.append('city' , city);
            formData.append('country' , country);

            $.ajax({
                url:"{{ url('admin/users/update/' . $users->id) }}",
                type:"POST",
                data:formData,
                processData: false,
                contentType: false,
                success:function(data){
                    Swal.fire({
                        title: 'لقد تم تعديل المستخدم بنجاح !',
                        confirmButtonText: 'تم',
                        type: 'success',
                        timer:2500
                    }).then(function() {
                        window.location = "{{route('users.index')}}";
                    });

                    $('#username_error').text("");
                    $('#email_error').text("");
                    $('#password_error').text("");
                    $('#phone_error').text("");
                    $('#country_error').text("");
                    $('#city_error').text("");
                    $('#address_error').text("");

                },error:function(error){
                    if(error.responseJSON.errors.username){
                        $('#username_error').text(error.responseJSON.errors.username);
                    }else{
                        $('#username_error').text("");
                    }

                    if(error.responseJSON.errors.email){
                        $('#email_error').text(error.responseJSON.errors.email);
                    }else{
                        $('#email_error').text("");
                    }

                    if(error.responseJSON.errors.password){
                        $('#password_error').text(error.responseJSON.errors.password);
                    }else{
                        $('#password_error').text("");
                    }

                    if(error.responseJSON.errors.phone){
                        $('#phone_error').text(error.responseJSON.errors.phone);
                    }else{
                        $('#phone_error').text("");
                    }

                    if(error.responseJSON.errors.country){
                        $('#country_error').text(error.responseJSON.errors.country);
                    }else{
                        $('#country_error').text("");
                    }

                    if(error.responseJSON.errors.city){
                        $('#city_error').text(error.responseJSON.errors.city);
                    }else{
                        $('#city_error').text("");
                    }

                    if(error.responseJSON.errors.address){
                        $('#address_error').text(error.responseJSON.errors.address);
                    }else{
                        $('#address_error').text("");
                    }

                    $.each(error.responseJSON.errors, function(key,value) {

                    });
                }
            });
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
