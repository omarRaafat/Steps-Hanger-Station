@extends('layouts.admin_container')
@section('content')
    <!-- Main Content -->


    <div class="ms-content-wrapper ">
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



                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-fh">
                            <div class="ms-panel-header">
                                <h6>{{__('menu.Restaurant Sections Images')}}</h6>
                            </div>
                            <div class="col-12">


                                    <div class="ms-panel-body">

                                        <div class="table-responsive text-center">
                                            <table class="table table-hover thead-primary">
                                                <thead>
                                                <tr>
                                                    <th># {{__('menu.Section Id')}}</th>
                                                    <th>{{__('menu.Section Name')}}</th>
                                                    <th>{{__('menu.Section Arrange')}}</th>
                                                    <th>{{__('menu.Section Image')}}</th>
{{--                                                    <th>Section Color</th>--}}
                                                    <th>{{__('menu.Actions')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($sections) > 0)
                                                    @foreach($sections as $section)

                                                        <tr>
                                                            <td>{{$section->id}}</td>
                                                            <td>{{$section->sectionTitle()}}</td>
                                                            <td>{{$section->section_arrange}}</td>
                                                            <td ><img src="{{$section->image}}" width="250" height="250"/></td>
{{--                                                            <td><span style="color: {{$section->color}}">{{$section->color}}</span></td>--}}
                                                            <td>
                                                                <a href="/admin/images/section/edit/{{$section->id}}" class="btn btn-success">{{__('menu.Edit')}}</a>
{{--                                                                <a data-swal-template="#my-templateAr{{$user->id}}" class="btn btn-danger" style="color:#fff;">Delete</a>--}}
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                @else
                                                    <tr><td colspan="5" class="text-center">{{__('menu.No Sections to edit')}}</td></tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>


                </div>





    </div>

@endsection
