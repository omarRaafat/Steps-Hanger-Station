@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Admins')}}</h4>
                            <a href="{{route('admin.create' , app()->getLocale())}}" class="btn btn-primary">{{__('messages.Add Admin')}}</a>
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
                                                <tr>
                                                    <th data-priority="4">{{__('messages.Name')}}</th>
                                                    <th data-priority="4">{{__('messages.E-mail')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($allAdmins) > 0)
                                                @foreach($allAdmins as $allAdmin)
                                                    <tr>
                                                        <td>{{$allAdmin->name}}</td>
                                                        <td>{{$allAdmin->email}}</td>
                                                        <td>
                                                            <a href="edit/{{$allAdmin->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                        </td>
                                                    </tr>
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