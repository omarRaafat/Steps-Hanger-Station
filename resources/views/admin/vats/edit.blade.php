@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Vats')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Edit Vats')}}</li>
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
              <h6>Edit Vats</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-row">

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Vat Number')}}</label>
                        <input type="text" class="form-control" name="vat_number" id="vat_number" value="{{$vats->vat_number}}" placeholder="Enter Value">
                        <div class="invalid-feedback" style="display:contents;" id="vat_number_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Value')}}</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">%</span>
                            <input type="text" class="form-control" name="value" id="value" value="{{$vats->value}}" placeholder="Enter Value">
                        </div>
                        <div class="invalid-feedback" style="display:contents;" id="value_error"></div>
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
<script type="application/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submitForm').submit(function(e){
            e.preventDefault();
            var vat_number = $('#vat_number').val();
            var value = $('#value').val();

            var formData = new FormData();

            formData.append('vat_number' , vat_number);
            formData.append('value' , value);

            $.ajax({
                url:"{{ url('admin/vats/update/' . $vats->id) }}",
                type:"POST",
                data:formData,
                processData: false,
                contentType: false,
                success:function(data){
                    Swal.fire({
                        title: 'لقد تم تعديل الضريبة بنجاح !',
                        confirmButtonText: 'تم',
                        type: 'success',
                        timer:2500
                    }).then(function() {
                        window.location = "{{route('vats.index')}}";
                    });

                    $('#vat_number_error').text('');
                    $('#value_error').text('');

                },error:function(error){
                    if(error.responseJSON.errors.vat_number){
                        $('#vat_number_error').text(error.responseJSON.errors.vat_number);
                    }else{
                        $('#vat_number_error').text("");
                    }

                    if(error.responseJSON.errors.value){
                        $('#value_error').text(error.responseJSON.errors.value);
                    }else{
                        $('#value_error').text("");
                    }
                    $.each(error.responseJSON.errors, function(key,value) {

                    });
                }
            });
        });
    });
</script>
@endsection
