@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    .multiselect-dropdown{
        width:20rem !important;
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
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{__('menu.Menu Meals')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('menu.Add Menu Meals')}}</li>
                </ol>
            </nav>
        </div>
        <form id="submitForm" method="POST" enctype="multipart/form-data" class="d-flex">
            @csrf
            <div class="col-xl-6 col-md-12">
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-header">
                        <h6>{{__('menu.Add Meals')}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>{{__('menu.Meal Name(Arabic)')}}</label>
                                <input type="text" class="form-control" name="meal_name_ar" id="meal_name_ar" placeholder="Meal Name(Arabic)">
                                <div class="invalid-feedback" id="meal_name_ar_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{__('menu.Meal Name(English)')}}</label>
                                <input type="text" class="form-control" name="meal_name_en" id="meal_name_en" placeholder="Meal Name(English)">
                                <div class="invalid-feedback" id="meal_name_en_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>{{__('menu.Meal Description(Arabic)')}}</label>
                                <textarea name="meal_description_ar" dir="right" class="form-control" id="meal_description_ar" cols="30" rows="5" style="resize: none;direction: rtl;"></textarea>
                                <div class="invalid-feedback" id="meal_description_ar_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>{{__('menu.Meal Description(English)')}}</label>
                                <textarea name="meal_description_en" dir="left" class="form-control" id="meal_description_en" cols="30" rows="5" style="resize: none;direction: ltr;"></textarea>
                                <div class="invalid-feedback" id="meal_description_en_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>{{__('menu.Quantity Type')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('menu.Enter Quantity Type')}}</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item infinityClick" style="cursor:pointer;" value="∞">∞</a>
                                            <a class="dropdown-item numberClick" style="cursor:pointer;" value="1">Number</a>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="quantity_type" id="quantity_type" readonly value="number" aria-label="Text input with dropdown button" style="height:40px;">
                                </div>
                                <div class="invalid-feedback" id="quantity_type_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{__('menu.Meal Quantity')}}</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Meal Quantity">
                                <div class="invalid-feedback" id="Meal_Quantity_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{__('menu.Meal Price')}}</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">SAR</span>
                                    <input type="text" class="form-control" name="meal_price" id="meal_price" placeholder="Meal Price">
                                </div>
                                <div class="invalid-feedback" id="meal_price_error" style="display: contents;"></div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label>{{__('menu.Select Catagory')}}</label>
                                <select name="meal_category_id" id="meal_category_id" class="form-control">
                                    <option disabled selected value="">-- Choose Category --</option>
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category_name_ar}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="meal_category_id_error" style="display: contents;"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ms-panel">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Images')}}</h6>
                            </div>
                            <br>
                            <div class="col-md-12 imageHere">
                                <label>{{__('menu.Meal Images')}}</label>
                                <div>
                                    <input type="file" accept="image/png , image/jpg , image/jpeg" name="meal_images[]" id="imgInp" multiple class="form-control">
                                    <div class="invalid-feedback" id="meal_image_error" style="display: contents;"></div>
                                </div>
                            </div>

                            <div class="ms-panel-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://via.placeholder.com/565x375" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://via.placeholder.com/565x375" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://via.placeholder.com/565x375" class="d-block w-100">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

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

                            <div class="col-md-12 mb-3 statusHere">
                                <label class="medium">{{__('menu.Status Available')}}</label>
                                <div>
                                    <label class="ms-switch">
                                        <input type="checkbox" name="status" id="status" value="0">
                                        <span class="ms-switch-slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="medium">{{__('menu.SKU Number')}}</label>
                                <input type="text" name="sku_number" id="sku_number" class="form-control" placeholder="SKU Number">
                                <div class="invalid-feedback" id="SKU_Number_error" style="display: contents;"></div>
                            </div>

                            <div class="col-md-12 ms-panel-header new">
                                <button class="btn btn-success" type="submit">{{__('menu.Save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{url('/admin/assets/js/multiselect-dropdown.js')}}"></script>
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $('#quantity').focus();
        $('.infinityClick').on('click' , function(){
            $('#quantity').val('');
            $('#quantity').val('∞');
            $('#quantity_type').val('∞');
        });

        $('.numberClick').on('click' , function(){
            $('#quantity').val('');
            $('#quantity').focus();
            $('#quantity_type').val('number');
        });

        $('#status').on('change' , function(e){
            var status = e.target.checked;
            if(status == true){
                $('#status').val(1);
            }else{
                $('#status').val(0);
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submitForm').submit(function(e){
            e.preventDefault();
            var meal_name_ar = $('#meal_name_ar').val();
            var meal_name_en = $('#meal_name_en').val();
            var meal_description_ar = $('#meal_description_ar').val();
            var meal_description_en = $('#meal_description_en').val();
            var meal_price = $('#meal_price').val();
            var quantity_type = $('#quantity_type').val();
            var quantity = $('#quantity').val();
            var meal_category_id = $('#meal_category_id').val();
            var sku_number = $('#sku_number').val();
            var status = $('#status').val();
            var TotalImages = document.getElementById('imgInp').files.length;

            var branch_ids = [];
            var selected = $(".branch_id :selected").map((_, e) => e.value).get();
            branch_ids.push(selected);

            var formData = new FormData();
            if(quantity_type == null){
                $('#quantity_type_error').text('quantity_type is required');
            }else if(meal_category_id == null){
                $('#quantity_type_error').text('');
                $('#meal_category_id_error').text('meal_category is required');
            }else{
                for (let i = 0; i < TotalImages; i++) {
                    formData.append('meal_images[]' , document.getElementById('imgInp').files[i]);
                }

                formData.append('meal_name_ar' , meal_name_ar);
                formData.append('meal_name_en' , meal_name_en);
                formData.append('meal_description_ar' , meal_description_ar);
                formData.append('meal_description_en' , meal_description_en);
                formData.append('meal_price' , meal_price);
                formData.append('quantity_type' , quantity_type);
                formData.append('quantity' , quantity);
                formData.append('meal_category_id' , meal_category_id);
                formData.append('sku_number' , sku_number);
                formData.append('status' , status);
                for(var i = 0 ; i<branch_ids[0].length ; i++){
                    formData.append('branch_id[]' , branch_ids[0][i]);
                }

                $.ajax({
                    url:"{{route('meals.store')}}",
                    type:"POST",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم حفظ الوجبة بنجاح !',
                            confirmButtonText: 'تم',
                            type: 'success',
                            timer:2500
                        })
                        $('#meal_name_ar').val("");
                        $('#meal_name_en').val("");
                        $('#meal_description_ar').val("");
                        $('#meal_description_en').val("");
                        $('#meal_price').val("");
                        $('#quantity').val("");
                        $('#imgInp').val("");
                        // $('#quantity_type').val('');
                        $('#meal_category_id').val('');
                        $('#sku_number').val('');
                        $('.carousel-inner').empty();
                        $('.carousel-inner').append(`
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="https://via.placeholder.com/565x375">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://via.placeholder.com/565x375">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://via.placeholder.com/565x375">
                            </div>
                        `);
                        // $('.branch_id').val(''); // Uncheck

                        $('#meal_name_ar_error').text('');
                        $('#meal_name_en_error').text('');
                        $('#meal_description_ar_error').text('');
                        $('#meal_description_en_error').text('');
                        $('#meal_price_error').text('');
                        $('#quantity_type_error').text('');
                        $('#Meal_Quantity_error').text('');
                        $('#meal_category_id_error').text('');
                        $('#meal_image_error').text('');
                        $('#branch_id_error').text('');

                    },error:function(error){
                        console.log(error.responseJSON.errors.meal_images);
                        if(error.responseJSON.errors.meal_name_ar){
                            $('#meal_name_ar_error').text(error.responseJSON.errors.meal_name_ar);
                        }else{
                            $('#meal_name_ar_error').text("");
                        }

                        if(error.responseJSON.errors.meal_name_en){
                            $('#meal_name_en_error').text(error.responseJSON.errors.meal_name_en)
                        }else{
                            $('#meal_name_en_error').text("");
                        }

                        if(error.responseJSON.errors.meal_description_ar){
                            $('#meal_description_ar_error').text(error.responseJSON.errors.meal_description_ar)
                        }else{
                            $('#meal_description_ar_error').text("");
                        }

                        if(error.responseJSON.errors.meal_description_en){
                            $('#meal_description_en_error').text(error.responseJSON.errors.meal_description_en)
                        }else{
                            $('#meal_description_en_error').text("");
                        }

                        if(error.responseJSON.errors.meal_price){
                            $('#meal_price_error').text(error.responseJSON.errors.meal_price)
                        }else{
                            $('#meal_price_error').text("");
                        }

                        if(error.responseJSON.errors.quantity_type){
                            $('#quantity_type_error').text(error.responseJSON.errors.quantity_type)
                        }else{
                            $('#quantity_type_error').text("");
                        }

                        if(error.responseJSON.errors.quantity){
                            $('#Meal_Quantity_error').text(error.responseJSON.errors.quantity)
                        }else{
                            $('#Meal_Quantity_error').text("");
                        }

                        if(error.responseJSON.errors.meal_category_id){
                            $('#meal_category_id_error').text(error.responseJSON.errors.meal_category_id)
                        }else{
                            $('#meal_category_id_error').text("");
                        }

                        if(error.responseJSON.errors.meal_images){
                            $('#meal_image_error').text(error.responseJSON.errors.meal_images)
                        }else{
                            $('#meal_image_error').text("");
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
            }
        });
    });
    var loadFile = function(event) {
        var blah = document.getElementById('blah');
        blah.src = URL.createObjectURL(event.target.files[0]);
        blah.onload = function() {
            URL.revokeObjectURL(blah.src) // free memory
        }
    };

    $("#imgInp").on("change", function(e) {
        var files = e.target.files;
        var filesLength = files.length;
        if(filesLength > 3){
            $('#meal_image_error').text('The meal images must not be greater than 3 Images.');
            $('#imgInp').val("");
        }else{
            $('#meal_image_error').text('');
            var size = document.getElementById('imgInp').files[0].size;
            console.log(size);
            if(size > 500000){
                $('#meal_image_error').text('The meal images must not be greater than 500kb.');
                $('#imgInp').val('');
            }else{
                $('#meal_image_error').text('');
                $('.carousel-inner').empty();
                for(var i = 0; i < filesLength; i++) {
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $('#meal_image_error').text('');
                        $('.carousel-inner').append(`
                            <div class="carousel-item">
                                <img class="d-block w-100" src="`+e.target.result+`">
                            </div>
                        `);
                        $(".carousel .carousel-item").first().addClass("active");

                    });
                    fileReader.readAsDataURL(files[i]);
                }
            }
        }
    });
</script>
@endsection
