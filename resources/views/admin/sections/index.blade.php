@extends('admin.index')
@section('main')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Sections')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                            @if( Config::get('app.locale') == 'en' )
                                                <tr>
                                                    <th data-priority="4">{{__('messages.Title_en')}}</th>
                                                    <th data-priority="4">{{__('messages.Desc_en')}}</th>
                                                    <th data-priority="10">{{__('messages.Image')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th data-priority="4">{{__('messages.Title_ar')}}</th>
                                                    <th data-priority="4">{{__('messages.Desc_ar')}}</th>
                                                    <th data-priority="10">{{__('messages.Image')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                            @endif
                                            </thead>
                                            <tbody>
                                            @if(count($sections) > 0)
                                                @foreach($sections as $section)
                                                @if( Config::get('app.locale') == 'en' )
                                                    <tr>
                                                        <td>{{$section->title_en}}</td>
                                                        <td>{{ Str::limit($section->desc_en , 50) }}</td>
                                                        <td><img src="{{ asset('uploads/' . $section->image) }}" alt="" width="50px" height="50px"></td>
                                                        <td>
                                                            <a href="edit/sections/{{$section->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                            <a data-swal-template="#my-templateEn{{$section->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                        </td>
                                                    </tr>
                                                    <template id="my-templateEn{{$section->id}}">
                                                        <swal-title>
                                                            Do You Want To Delete This Section?
                                                        </swal-title>
                                                        <swal-icon type="warning" color="red"></swal-icon>
                                                        <swal-button type="confirm">
                                                            <a href="{{route('sections.delete' , ['language' => app()->getLocale() , 'id' => $section->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
                                                        </swal-button>
                                                        <swal-button type="cancel">
                                                            cancel
                                                        </swal-button>
                                                        <swal-param name="allowEscapeKey" value="false" />
                                                        <swal-param
                                                            name="customClass"
                                                            value='{ "popup": "my-popup" }' />
                                                    </template>
                                                @else
                                                    <tr>
                                                        <td>{{$section->title_ar}}</td>
                                                        <td>{{ Str::limit($section->desc_ar , 50) }}</td>
                                                        <td><img src="{{ asset('uploads/' . $section->image) }}" alt="" width="50px" height="50px"></td>
                                                        <td>
                                                            <a href="edit/sections/{{$section->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                            <a data-swal-template="#my-templateAr{{$section->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                        </td>
                                                    </tr>
                                                    <template id="my-templateAr{{$section->id}}">
                                                        <swal-title>
                                                            هل تريد مسح هذه الجزء؟
                                                        </swal-title>
                                                        <swal-icon type="warning" color="red"></swal-icon>
                                                        <swal-button type="confirm">
                                                            <a href="{{route('sections.delete' , ['language' => app()->getLocale() , 'id' => $section->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
                                                        </swal-button>
                                                        <swal-button type="cancel">
                                                            إلغاء
                                                        </swal-button>
                                                        <swal-param name="allowEscapeKey" value="false" />
                                                        <swal-param
                                                            name="customClass"
                                                            value='{ "popup": "my-popup" }' />
                                                    </template>
                                                @endif    
                                                @endforeach
                                            @else
                                                    <tr><td colspan="5" class="text-center">{{__('messages.No Data Yet')}}</td></tr>
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
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.bindClickHandler()
    
        Swal.mixin({
        modal: true,
        }).bindClickHandler('data-swal-template')
    </script>
@endsection