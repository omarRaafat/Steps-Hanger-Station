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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Terms')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Terms')}}</li>
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
                                                        <th data-priority="10">{{__('messages.Term_en')}}</th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th data-priority="10">{{__('messages.Term_ar')}}</th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if(count($terms) > 0)
                                                @foreach($terms as $term)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>
                                                            <td>{!! Str::limit(strip_tags($term->term_en) , 100) !!}</td>
                                                            <td><a href="edit/terms/{{$term->id}}" class="btn btn-success">{{__('messages.Edit')}}</a></td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{!! Str::limit(strip_tags($term->term_ar) , 100) !!}</td>
                                                            <td><a href="edit/terms/{{$term->id}}" class="btn btn-success">{{__('messages.Edit')}}</a></td>
                                                        </tr>
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
@endsection