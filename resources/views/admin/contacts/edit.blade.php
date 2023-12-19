@extends('admin.index')
@section('main')
<link href="/assetsAdmin/libs/dropify/dist/css/dropify.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<style>
    .swal2-shown {
        overflow: unset !important;
        padding-right: 0px !important;
    }
</style>
    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Contacts')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Contacts')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Contacts')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <form id="submitForm" method="POST" enctype="multipart/form-data">
                                    @csrf -->

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$contacts->name}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.E-mail')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="email" id="email" placeholder="Enter E-mail" value="{{$contacts->email}}" type="email">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Phone')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{$contacts->phone}}" type="tel">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Address')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$contacts->address}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Help')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="help" id="help" class="form-control" cols="30" rows="10" style="resize: none;">{{$contacts->help}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <a href="{{route('contacts.index' , app()->getLocale())}}" class="btn btn-primary">{{__('Back')}}</a>
                                        </div>
                                    </div>

                                    <!-- <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Update')}}</button>
                                        </div>
                                    </div> -->

                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="/assetsAdmin/libs/dropify/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submitForm').submit(function(e){
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var help = $('#help').val();

                var formData = new FormData();
                formData.append('name' , name);
                formData.append('email' , email);
                formData.append('phone' , phone);
                formData.append('address' , address);
                formData.append('help' , help);

                $.ajax({
                    url:"{{route('contacts.update' , ['language' => app()->getLocale() , 'id' => request()->id])}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم تعديل بيانات التواصل بنجاح !',
                            confirmButtonText: 'تم',
                            icon: 'success'
                        }).then(function() {
                            window.location = "{{route('contacts.index' , app()->getLocale())}}";
                        });


                    },error:function(error){
                        console.log(error.responseText);
                        $.each(error.responseJSON.errors, function(key,value) {
                            Swal.fire({
                                title: 'هناك خطأ ما عند التعديل ! <br><br> <div style="color:red;">'+value+'</div>',
                                confirmButtonText: 'تم',
                                icon: 'error'
                            })
                        });
                    }
                });
            });
        });
    </script>
@endsection
