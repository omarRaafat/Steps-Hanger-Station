@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Admins')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Edit Admin')}}</li>
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
              <h6>{{__('menu.Edit Admin')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Username')}}</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{$admins->username}}" placeholder="Username">
                        <div class="invalid-feedback" style="display:contents;" id="errorUsername"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.E-mail')}}</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{$admins->email}}" placeholder="E-mail">
                        <div class="invalid-feedback" style="display:contents;" id="errorEmail"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Password')}}</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="invalid-feedback" style="display:contents;" id="errorPassword"></div>
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
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11" charset="UTF-8"></script>
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
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        // console.log($('#imageAppended')[0].files[0]);

        var formData = new FormData();

        formData.append('username' , username);
        formData.append('email' , email);
        formData.append('password' , password);

        $.ajax({
            url:"{{ url('admin/admins/update/' . $admins->id) }}",
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            success:function(data){
                Swal.fire({
                    title: 'لقد تم تعديل المدير بنجاح !',
                    confirmButtonText: 'تم',
                    type: 'success',
                    timer:2500
                }).then(function() {
                    window.location = "{{route('admins.index')}}";
                });

            },error:function(error){
                if(error.responseJSON.errors.username){
                  $('#errorUsername').text(error.responseJSON.errors.username);
                }else{
                  $('#errorUsername').text("");
                }

                if(error.responseJSON.errors.email){
                  $('#errorEmail').text(error.responseJSON.errors.email)
                }else{
                  $('#errorEmail').text("");
                }

                if(error.responseJSON.errors.password){
                  $('#errorPassword').text(error.responseJSON.errors.password)
                }else{
                  $('#errorPassword').text("");
                }
                $.each(error.responseJSON.errors, function(key,value) {

                });
            }
        });
    });
  });
</script>
@endsection
