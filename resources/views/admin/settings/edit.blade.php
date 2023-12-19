@extends('admin.index')
@section('main')
<link href="/assetsAdmin/libs/dropify/dist/css/dropify.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Settings')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Settings')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Settings')}}</li>
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
                                <form id="submitForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Breif_ar')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="breif_ar" id="breif_ar" dir="rtl" class="form-control" cols="30" rows="10" style="resize: none;">{!! $settings->breif_ar !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Breif_en')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="breif_en" id="breif_en" dir="ltr" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->breif_en}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.About-Us-ar')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="about_us_ar" id="about_us_ar" dir="rtl" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->about_us_ar}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.About-Us-en')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="about_us_en" id="about_us_en" dir="ltr" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->about_us_en}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="mt-3">
                                            <label for="formFile" class="form-label">{{__('messages.Edit Image About_Us')}}</label>
                                            <input class="dropify" accept="image/png, image/jpeg, image/jpg, image/svg" id="imageAppended1" value="{{$settings->about_us_image}}" data-default-file="{{ asset('uploads/' . $settings->about_us_image) }}" type="file" name="about_us_image" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="mt-3">
                                            <label for="formFile" class="form-label">{{__('messages.Edit Image WhySteps')}}</label>
                                            <input class="dropify" accept="image/png, image/jpeg, image/jpg, image/svg" id="imageAppended2" value="{{$settings->why_steps_image}}" data-default-file="{{ asset('uploads/' . $settings->why_steps_image) }}" type="file" name="why_steps_image" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-md-2 col-form-label">{{__('messages.E-mail')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" id="email" name="email" value="{{$settings->email}}" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="example-tel-input" class="col-md-2 col-form-label">{{__('messages.Phone')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="tel" id="phone" name="phone" value="{{$settings->phone}}" placeholder="Enter Phone">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Address')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$settings->address}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Twitter')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="twitter" id="twitter" placeholder="Enter Twitter" value="{{$settings->twitter}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Facebook')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="facebook" id="facebook" placeholder="Enter Facebook" value="{{$settings->facebook}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Instagram')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="instagram" id="instagram" placeholder="Enter Instagram" value="{{$settings->instagram}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Update')}}</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- <div class="mb-3 row">
                                    <div class="mt-3">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/n960vk1u0in3zac3p0gljttk1gamhq6t2gsszd14isxeahqo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#breif_ar'
    });
    </script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#breif_en'
    });
    </script>
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
                var breif_ar = $('#breif_ar').val();
                var breif_en = $('#breif_en').val();
                var about_us_ar = $('#about_us_ar').val();
                var about_us_en = $('#about_us_en').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                var twitter = $('#twitter').val();
                var facebook = $('#facebook').val();
                var instagram = $('#instagram').val();

                var formData = new FormData();
                if($('#imageAppended1')[0].files[0] != null){
                    formData.append('breif_ar' , breif_ar);
                    formData.append('breif_en' , breif_en);
                    formData.append('about_us_ar' , about_us_ar);
                    formData.append('about_us_en' , about_us_en);
                    formData.append('about_us_image' , $('#imageAppended1')[0].files[0]);
                    formData.append('email' , email);
                    formData.append('phone' , phone);
                    formData.append('address' , address);
                    formData.append('twitter' , twitter);
                    formData.append('facebook' , facebook);
                    formData.append('instagram' , instagram);
                }else if($('#imageAppended2')[0].files[0] != null){
                    formData.append('breif_ar' , breif_ar);
                    formData.append('breif_en' , breif_en);
                    formData.append('about_us_ar' , about_us_ar);
                    formData.append('about_us_en' , about_us_en);
                    formData.append('why_steps_image' , $('#imageAppended2')[0].files[0]);
                    formData.append('email' , email);
                    formData.append('phone' , phone);
                    formData.append('address' , address);
                    formData.append('twitter' , twitter);
                    formData.append('facebook' , facebook);
                    formData.append('instagram' , instagram);
                }else{
                    formData.append('breif_ar' , breif_ar);
                    formData.append('breif_en' , breif_en);
                    formData.append('about_us_ar' , about_us_ar);
                    formData.append('about_us_en' , about_us_en);
                    formData.append('email' , email);
                    formData.append('phone' , phone);
                    formData.append('address' , address);
                    formData.append('twitter' , twitter);
                    formData.append('facebook' , facebook);
                    formData.append('instagram' , instagram);
                }

                $.ajax({
                    url:"{{route('settings.update' , ['language' => app()->getLocale() , 'id' => request()->id])}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم تعديل إعدادات الموقع بنجاح !',
                            confirmButtonText: 'تم',
                            icon: 'success'
                        }).then(function() {
                            window.location = "{{route('settings.index' , app()->getLocale())}}";
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