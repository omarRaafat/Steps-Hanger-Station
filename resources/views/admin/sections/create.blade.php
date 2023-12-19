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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Sections')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Sections')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Create Sections')}}</li>
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
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Title_ar')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="title_ar" id="title_ar" placeholder="Enter Title" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Title_en')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="title_en" id="title_en" placeholder="Enter Title" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Desc_ar')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="desc_ar" id="desc_ar" dir="rtl" class="form-control" cols="30" rows="10" style="resize: none;"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Desc_en')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="desc_en" id="desc_en" dir="ltr" class="form-control" cols="30" rows="10" style="resize: none;"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Image')}}</label>
                                        <div class="col-md-10">
                                            <input name="image" id="imageAppended" class="dropify" type="file">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Save')}}</button>
                                        </div>
                                    </div>

                                </form>
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
                var title_ar = $('#title_ar').val();
                var title_en = $('#title_en').val();
                var desc_ar = $('#desc_ar').val();
                var desc_en = $('#desc_en').val();
                // console.log($('#imageAppended')[0].files[0]);

                var formData = new FormData();

                formData.append('title_ar' , title_ar);
                formData.append('title_en' , title_en);
                formData.append('desc_ar' , desc_ar);
                formData.append('desc_en' , desc_en);
                formData.append('image' , $('#imageAppended')[0].files[0]);

                $.ajax({
                    url:"{{route('sections.store' , app()->getLocale())}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم حفظ الجزء بنجاح !',
                            confirmButtonText: 'تم',
                            icon: 'success'
                        })
                        $('#title_ar').val("");
                        $('#title_en').val("");
                        $('#desc_ar').val("");
                        $('#desc_en').val("");
                        $(".dropify-clear").click();

                    },error:function(error){
                        console.log(error.responseText);
                        $.each(error.responseJSON.errors, function(key,value) {
                            Swal.fire({
                                title: 'هناك خطأ ما عند التسجيل ! <br><br> <div style="color:red;">'+value+'</div>',
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
