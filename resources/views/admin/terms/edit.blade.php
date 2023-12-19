@extends('admin.index')
@section('main')
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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Terms')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Terms')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Terms')}}</li>
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
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Term_ar')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="term_ar" id="term_ar" dir="rtl" class="form-control" cols="30" rows="10" style="resize: none;">{!! $terms->term_ar !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Term_en')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="term_en" id="term_en" dir="ltr" class="form-control" cols="30" rows="10" style="resize: none;">{{$terms->term_en}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Update')}}</button>
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
    <script src="https://cdn.tiny.cloud/1/n960vk1u0in3zac3p0gljttk1gamhq6t2gsszd14isxeahqo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#term_ar'
    });
    </script>
    <script type="text/javascript">
    tinymce.init({
        selector: '#term_en'
    });
    </script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submitForm').submit(function(e){
                e.preventDefault();
                var term_ar = $('#term_ar').val();
                var term_en = $('#term_en').val();

                var formData = new FormData();

                formData.append('term_ar' , term_ar);
                formData.append('term_en' , term_en);

                $.ajax({
                    url:"{{route('terms.update' , ['language' => app()->getLocale() , 'id' => request()->id])}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم تعديل الشروط والأحكام بنجاح !',
                            confirmButtonText: 'تم',
                            icon: 'success'
                        }).then(function() {
                            window.location = "{{route('terms.index' , app()->getLocale())}}";
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
