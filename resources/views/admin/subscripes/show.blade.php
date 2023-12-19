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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Subscriptions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Subscriptions')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Show Subscriptions')}}</li>
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
                                <form id="submitForm">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Store Name')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="store_name" id="store_name" placeholder="Enter Store Name" value="{{$subscripes->store_name}}" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Store Link')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="store_link" id="store_link" placeholder="Enter Store Link" value="{{$subscripes->store_link}}" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Company')}}</label>
                                        <div class="col-md-10">
                                        <select class="form-control" id="company_kind" name="company_kind" disabled>
                                            <option disabled>Select_Option</option>
                                            <option value="فرد" @if($subscripes->company_kind == 'فرد') selected @endif>فرد</option>
                                            <option value="مؤسسة" @if($subscripes->company_kind == 'مؤسسة') selected @endif>مؤسسة</option>
                                            <option value="شركة" @if($subscripes->company_kind == 'شركة') selected @endif>شركة</option>
                                            <option value="جمعية خيرية" @if($subscripes->company_kind == 'جمعية خيرية') selected @endif>جمعية خيرية</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Manager')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="manager" id="manager" placeholder="Enter Manager" value="{{$subscripes->manager}}" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Phone')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{$subscripes->phone}}" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.E-mail')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="email" id="email" placeholder="Enter E-mail" value="{{$subscripes->email}}" type="email" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Password')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="password" id="password" placeholder="Enter Password" value="{{$subscripes->password}}" type="password" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Order Percenatge')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="order_percentage" id="order_percentage" placeholder="Enter Order Percenatge" value="{{$subscripes->order_percentage}}" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>



                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit" id="accept" >{{__('messages.Accept')}}</button>
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
                $("#accept").prop("disabled" , true);
                e.preventDefault();
                $.ajax({
                    url:"{{route('subscripes.accept' , ['language' => app()->getLocale() , 'id' => request()->id])}}",
                    type:"GET",
                    success:function(data){
// alert(data)
                        if (data === "SUCCESS"){

                            Swal.fire({
                                title: 'لقد تم إنشاء موقع العميل بنجاح',
                                confirmButtonText: 'تم ',
                                icon: 'success'
                            }).then(function() {
                                window.location = "{{route('subscripes.index' , app()->getLocale())}}";
                            });
                        }else{
                            Swal.fire({
                                title: 'هناك خطأ حدث ....حاول مرة أخرى',
                                confirmButtonText: 'تم ',
                                icon: 'error'
                            }).then(function() {
                                window.location = "{{route('subscripes.index' , app()->getLocale())}}";
                            });
                        }



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
