@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    .multiselect-dropdown{
        width:57.5rem !important;
        height:50px;
        background-image: none;
    }
    .multiselect-dropdown input[type="checkbox"]{
        -ms-transform: scale(1); /* IE */
        -moz-transform: scale(1); /* FF */
        -webkit-transform: scale(1); /* Safari and Chrome */
        -o-transform: scale(1); /* Opera */
        transform: scale(1.6);
        padding: 10px;
        position:relative;
    }
    .multiselect-dropdown label{
        margin-right:15px;
    }
</style>

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Category Menu')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Add Category Menu')}}</li>
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
              <h6>{{__('menu.Add Categories')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Category Name(Arabic)')}}</label>
                        <input type="text" class="form-control" name="category_name_ar" id="category_name_ar" placeholder="Category_Name(Arabic)">
                        <div class="invalid-feedback" style="display:contents;" id="category_name_ar_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Category Name(English)')}}</label>
                        <input type="text" class="form-control" name="category_name_en" id="category_name_en" placeholder="Category_Name(English)">
                        <div class="invalid-feedback" style="display:contents;" id="category_name_en_error"></div>
                    </div>

                    <br>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Select Branches')}}</label>
                        <br>
                        <select name="branch_id[]" id="branch_id" class="branch_id" multiple onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))" >
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{$branch->branch_name_ar}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="branch_id_error" style="display: contents;"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button class="btn btn-success" type="submit">{{__('menu.Save')}}</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
<script src="{{url('/admin/assets/js/multiselect-dropdown.js')}}"></script>
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
  $(document).ready(function(){
    $('.dropify').dropify();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#submitForm').submit(function(e){
        e.preventDefault();
        var category_name_ar = $('#category_name_ar').val();
        var category_name_en = $('#category_name_en').val();

        var branch_ids = [];
        var selected = $(".branch_id :selected").map((_, e) => e.value).get();
        branch_ids.push(selected);

        var formData = new FormData();

        formData.append('category_name_ar' , category_name_ar);
        formData.append('category_name_en' , category_name_en);
        for(var i = 0 ; i<branch_ids[0].length ; i++){
            formData.append('branch_id[]' , branch_ids[0][i]);
        }

        $.ajax({
            url:"{{route('category.store')}}",
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            success:function(data){
                Swal.fire({
                    title: 'لقد تم حفظ الصنف بنجاح !',
                    confirmButtonText: 'تم',
                    type: 'success',
                    timer:2500
                })
                $('#category_name_ar').val("");
                $('#category_name_en').val("");
                $('.branch_id').val(''); // Uncheck

                $('#category_name_ar_error').text('');
                $('#category_name_en_error').text('');
                $('#branch_id_error').text('');

            },error:function(error){
                if(error.responseJSON.errors.category_name_ar){
                    $('#category_name_ar_error').text(error.responseJSON.errors.category_name_ar);
                }else{
                    $('#category_name_ar_error').text("");
                }

                if(error.responseJSON.errors.category_name_en){
                    $('#category_name_en_error').text(error.responseJSON.errors.category_name_en)
                }else{
                    $('#category_name_en_error').text("");
                }

                if(error.responseJSON.errors.branch_id){
                    $('#branch_id_error').text(error.responseJSON.errors.branch_id)
                }else{
                    $('#branch_id_error').text("");
                }

                $.each(error.responseJSON.errors, function(key,value) {

                });
            }
        });
    });
  });
  var loadFile = function(event) {
      var blah = document.getElementById('blah');
      blah.src = URL.createObjectURL(event.target.files[0]);
      blah.onload = function() {
          URL.revokeObjectURL(blah.src) // free memory
      }
  };
</script>
@endsection
