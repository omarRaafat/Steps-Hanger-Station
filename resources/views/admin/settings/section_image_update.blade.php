@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->


    <div class="ms-content-wrapper container ">
        <div class="row">




            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{__('menu.Settings')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('menu.Update Section')}}</li>
                    </ol>
                </nav>
            </div>
            <form id="submitForm" method="POST"  action="{{route('section')}}" enctype="multipart/form-data" class="d-flex">
                @csrf
                <div class="row">

<input type="hidden" name="section_id" value="{{$section->id}}">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Restaurant Section')}} </h6>
                            </div>
                            <div class="ms-panel-body">
                                <div class="form-row">

                                    <div class="col-md-12 mb-3">

                                        <h3>{{$section->sectionTitle()}} {{__('menu.Section')}}</h3>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>{{__('menu.Section Image')}}</label>
                                        <img src="{{url($section->image?$section->image:'')}}" alt="Girl in a jacket" id="output_{{$section->id}}" width="300" height="300" class="">

                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>{{__('menu.Change Image')}}</label>
                                        <input type="file" class="form-control" id="imgInp"  onchange="loadFile(event,{{$section->id}})"  name="image" required >

                                    </div>

{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <label>selection Background Color</label>--}}
{{--                                        <input type="color" class="form-control" name="color" >--}}
{{--                                        <div class="invalid-feedback" id="restaurant_Quantity_error" style="display: contents;"></div>--}}
{{--                                    </div>--}}


                                </div>
                                <div class="col-md-12 ms-panel-header new">
                                    <button class="btn btn-success btn-block" type="submit">{{__('menu.UPDATE')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>




        </div>
    </div>

@endsection
