@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->
<style>
    .img-upload-btn {
        position: relative;
        overflow: hidden;
        padding-top: 95%;
    }

    .img-upload-btn input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .img-upload-btn i {
        position: absolute;
        height: 16px;
        width: 16px;
        top: 50%;
        left: 50%;
        margin-top: -8px;
        margin-left: -8px;
    }

    .btn-radio {
        position: relative;
        overflow: hidden;
    }

    .btn-radio input[type=radio] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>

    <div class="ms-content-wrapper container">
        <div class="row">




            <div class="col-xl-12 col-md-12">
                <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-header">
                        <h6>{{__('menu.SLIDER ADS CONTENT')}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <form class="ms-form-wizard style1-wizard" action="{{route('slider')}}" method="POST" enctype="multipart/form-data" id="default-wizard">
                            @csrf
                            @if($sliders->count()>0)
                            @foreach($sliders as $key=>$slider)
                            <input type="hidden" name="id[]" value="{{$slider->id}}">
                            <h3>{{__('menu.slider')}} {{$key+1}}</h3>
                            <div class="ms-wizard-step">

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.Title')}} بالعربية</label>
                                        <div class="input-group">
                                            <input type="text" name="title_ar[]" value="{{$slider->title_ar}}" class="form-control" placeholder="Slider Title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{__('menu.Title')}} English</label>
                                        <div class="input-group">
                                            <input type="text" name="title_en[]" value="{{$slider->title_en}}" class="form-control" placeholder="Slider Title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>{{__('menu.Description')}} بالعربية</label>
                                        <div class="input-group">
                                            <textarea name="description_ar[]"  class="form-control"  placeholder="description" style="height: 200px;" required>{{$slider->description_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>{{__('menu.Description')}} English</label>
                                        <div class="input-group">
                                            <textarea name="description_en[]"  class="form-control"  placeholder="description" style="height: 200px;" required>{{$slider->description_en}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label>{{__('menu.Image')}}</label>

                                        <div class="input-group">

{{--                                            <input type="hidden" name="single_id_{{$slider->id}}" value="{{$slider->id}}">--}}
                                            <input type="file" class="form-control" id="imgInp"  onchange="loadFile(event,{{$slider->id}})"  name="single_image_{{$slider->id}}" required >


                                        </div>

                                        <img src="{{$slider->image}}" alt="Girl in a jacket" id="output_{{$slider->id}}" width="300" height="300" class="">
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @else
                                <h3>Slider 1</h3>
                                <div class="ms-wizard-step">

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label>{{__('menu.Title')}}</label>
                                            <div class="input-group">
                                                <input type="text" name="title[]"  class="form-control" placeholder="Slider Title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>{{__('menu.Description')}}</label>
                                            <div class="input-group">
                                                <textarea name="description[]"  class="form-control"  placeholder="description" style="height: 200px;" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>{{__('menu.Image')}}</label>

                                            <div class="input-group">
                                                <input type="file" class="form-control" name="image[]" required>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <h3>Slider 2</h3>
                                <div class="ms-wizard-step">

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label>{{__('menu.Title')}}</label>
                                            <div class="input-group">
                                                <input type="text" name="title[]"  class="form-control" placeholder="Slider Title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>{{__('menu.Description')}}</label>
                                            <div class="input-group">
                                                <textarea name="description[]"  class="form-control"  placeholder="description" style="height: 200px;" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>{{__('menu.Image')}}</label>

                                            <div class="input-group">
                                                <input type="file" class="form-control" name="image[]" required>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <h3>Slider 2</h3>
                                <div class="ms-wizard-step">

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label>{{__('menu.Title')}}</label>
                                            <div class="input-group">
                                                <input type="text" name="title[]"  class="form-control" placeholder="Slider Title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>{{__('menu.Description')}}</label>
                                            <div class="input-group">
                                                <textarea name="description[]"  class="form-control"  placeholder="description" style="height: 200px;" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label>{{__('menu.Image')}}</label>

                                            <div class="input-group">
                                                <input type="file" class="form-control" name="image[]" required>

                                            </div>

                                        </div>

                                    </div>
                                </div>
@endif
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>


@endsection
