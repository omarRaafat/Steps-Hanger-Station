@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->


    <div class="container-fluid ">
        <div class="row">




            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{__('menu.Settings')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('menu.Update Settings')}}</li>
                    </ol>
                </nav>
            </div>
            <div class=" col-md-12">





                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Restaurant Category Selection')}}</h6>
                            </div>
                            <div class="ms-panel-body">
                                <div class="form-row">

                                    <header class="major">
                                        <h3>{{__('menu.Choose Which Category To Present To Clients')}}</h3>
                                    </header>
                                <div class="container-fluid" style="margin-top:50px;">
                                    <section id="basicusage" class="wrapper special" >


                                               <div class="row">

                                                   <div class="col-md-3 text-center" style="height: fit-content;">
                                                       <!-- Block item -->
                                                       <h3 class="" id="title_1" >{{$settings->catTitle1()}}</h3>

                                                           <img src="{{url('/img/breakfast.png')}}" class="img-fluid " onclick="catClick(1)" style="width: 200px;margin-left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;;"   alt="" >


                                                       <span class="spacer" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"></span>
                                                       <form method="post" id="cat_form_1"   >
                                                           @csrf
                                                       <div class="row container" id="cat_div_1" style="display: none;margin-left: 2px;">

                                                               @csrf
                                                           <div class="col-md-12">
                                                               <input type="text" name="cat_title_{{app()->getLocale()}}_1" class="form-control" value="{{$settings->catTitle1()}}" placeholder="change category title" style="width: 190px; margin-left: 65px;"  id="cat_title_1" >
                                                           </div>
<br>
                                                           <div class="col-md-12">
                                                               <input type="time" name="cat_time_from_1" class="form-control"  value="{{$settings->cat_time_from_1}}" style="width: 190px;    margin-left: 65px;" id="cat_time_from_1" >
                                                           </div>
                                                           <div class="col-md-12">
                                                           <input type="time" name="cat_time_to_1" class="form-control" value="{{$settings->cat_time_to_1}}" style="width: 190px; margin-left: 65px;" id="cat_time_to_1"  >
                                                           </div>
                                                           <input class="btn btn-primary "  onclick="catCustom(1)" value="update">

                                                       </div>
                                                       </form>
                                                       <input type="button" id="cat_btn_1" class="btn btn-primary"  onclick="openCustom(1)" value="change">
                                                       <!-- End Block item -->
                                                   </div>
                                                   <div class="col-md-3 text-center" style="height: fit-content;">
                                                       <!-- Block item -->
                                                       <h3 class="" id="title_2" >{{$settings->catTitle2()}}</h3>
                                                       <img src="{{url('/img/lunch.png')}}" class="img-fluid " onclick="catClick(2)" style="width: 200px;margin-left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;;"   alt="" >


                                                       <!-- End Block item -->
                                                       <span class="spacer" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"></span>
                                                       <form method="post" id="cat_form_2"   >
                                                           @csrf
                                                           <div class="row container" id="cat_div_2" style="display: none;margin-left: 2px;">

                                                               @csrf
                                                               <div class="col-md-12">
                                                                   <input type="text" name="cat_title_2" class="form-control" value="{{$settings->catTitle2()}}" placeholder="change category title" style="width: 190px; margin-left: 65px;"  id="cat_title_2" >
                                                               </div>
                                                               <br>
                                                               <div class="col-md-12">
                                                                   <input type="time" name="cat_time_from_2" class="form-control"  value="{{$settings->cat_time_from_2}}" style="width: 190px;    margin-left: 65px;" id="cat_time_from_2" >
                                                               </div>
                                                               <div class="col-md-12">
                                                                   <input type="time" name="cat_time_to_2" class="form-control" value="{{$settings->cat_time_to_2}}" style="width: 190px; margin-left: 65px;" id="cat_time_to_2"  >
                                                               </div>
                                                               <input class="btn btn-primary "  onclick="catCustom(2)" value="update">

                                                           </div>
                                                       </form>
                                                       <input type="button" id="cat_btn_2" class="btn btn-primary"  onclick="openCustom(2)" value="change">
                                                   </div>
                                                   <div class="col-md-3 text-center" style="height: fit-content;">
                                                       <!-- Block item -->
                                                       <h3 class="" id="title_3" >{{$settings->catTitle3()}}</h3>
                                                       <img src="{{url('/img/dinner.png')}}" class="img-fluid " onclick="catClick(3)" style="width: 200px;margin-left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;;"   alt="" >


                                                       <!-- End Block item -->
                                                       <span class="spacer" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"></span>
                                                       <form method="post" id="cat_form_3"   >
                                                           @csrf
                                                           <div class="row container" id="cat_div_3" style="display: none;margin-left: 2px;">

                                                               @csrf
                                                               <div class="col-md-12">
                                                                   <input type="text" name="cat_title_3" class="form-control" value="{{$settings->catTitle3()}}" placeholder="change category title" style="width: 190px; margin-left: 65px;"  id="cat_title_3" >
                                                               </div>
                                                               <br>
                                                               <div class="col-md-12">
                                                                   <input type="time" name="cat_time_from_3" class="form-control"  value="{{$settings->cat_time_from_3}}" style="width: 190px;    margin-left: 65px;" id="cat_time_from_3" >
                                                               </div>
                                                               <div class="col-md-12">
                                                                   <input type="time" name="cat_time_to_3" class="form-control" value="{{$settings->cat_time_to_3}}" style="width: 190px; margin-left: 65px;" id="cat_time_to_3"  >
                                                               </div>
                                                               <input class="btn btn-primary "  onclick="catCustom(3)" value="update">

                                                           </div>
                                                       </form>
                                                       <input type="button" id="cat_btn_3" class="btn btn-primary"  onclick="openCustom(3)" value="change">
                                                   </div>
                                                   <div class="col-md-3 text-center" style="height: fit-content;">
                                                       <!-- Block item -->
                                                       <h3 class="" id="title_4" >{{$settings->catTitle4()}}</h3>
                                                       <img src="{{url('/img/dessert.png')}}"  class="img-fluid " onclick="catClick(4)" style="width: 200px;margin-left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;;"   alt="" >

                                                       <span class="spacer" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"></span>


                                                       <form method="post" id="cat_form_4"   >
                                                           @csrf
                                                           <div class="row container" id="cat_div_4" style="display: none;margin-left: 2px;">

                                                               @csrf
                                                               <div class="col-md-12">
                                                                   <input type="text" name="cat_title_4" class="form-control" value="{{$settings->catTitle4()}}" placeholder="change category title" style="width: 190px; margin-left: 65px;"  id="cat_title_4" >
                                                               </div>
                                                               <br>
                                                               <div class="col-md-12">
                                                                   <input type="time" name="cat_time_from_4" class="form-control"  value="{{$settings->cat_time_from_4}}" style="width: 190px;    margin-left: 65px;" id="cat_time_from_4" >
                                                               </div>
                                                               <div class="col-md-12">
                                                                   <input type="time" name="cat_time_to_4" class="form-control" value="{{$settings->cat_time_to_4}}" style="width: 190px; margin-left: 65px;" id="cat_time_to_4"  >
                                                               </div>
                                                               <input class="btn btn-primary "  onclick="catCustom(4)" value="update">

                                                           </div>
                                                       </form>
                                                       <input type="button" id="cat_btn_4" class="btn btn-primary"  onclick="openCustom(4)" value="change">




                                                   </div>

                                               </div>
                                            <br>
{{--                                            <input  class="btn btn-primary btn-block" value="add new"  type="submit" />--}}

                                    </section>




                                </div>
                            </div>
                        </div>






            </div>


        </div>

    </div>
        <script>
            $(document).ready(function() {
                $("img").imgCheckbox();
            });
        </script>

@endsection
