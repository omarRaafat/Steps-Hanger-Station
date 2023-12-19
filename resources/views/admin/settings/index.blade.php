@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Settings')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Settings')}}</li>
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
                                                    <th data-priority="10">{{__('messages.Breif_en')}}</th>
                                                    <th data-priority="10">{{__('messages.About-Us-en')}}</th>
                                                    <th data-priority="1">{{__('messages.E-mail')}}</th>
                                                    <th data-priority="1">{{__('messages.Phone')}}</th>
                                                    <th data-priority="10">{{__('messages.Address')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th data-priority="10">{{__('messages.Breif_ar')}}</th>
                                                    <th data-priority="10">{{__('messages.About-Us-ar')}}</th>
                                                    <th data-priority="1">{{__('messages.E-mail')}}</th>
                                                    <th data-priority="1">{{__('messages.Phone')}}</th>
                                                    <th data-priority="10">{{__('messages.Address')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                                @foreach($settings as $setting)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>
                                                            <td>{!! Str::limit($setting->breif_en, 50) !!}</td>
                                                            <td>{{ Str::limit($setting->about_us_en, 50) }}</td>
                                                            <td>{{$setting->email}}</td>
                                                            <td>{{$setting->phone}}</td>
                                                            <td>{{$setting->address}}</td>
                                                            <td><a href="edit/settings/{{$setting->id}}" class="btn btn-success">{{__('messages.Edit')}}</a></td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{!! Str::limit($setting->breif_ar, 50) !!}</td>
                                                            <td>{{ Str::limit($setting->about_us_ar, 50) }}</td>
                                                            <td>{{$setting->email}}</td>
                                                            <td>{{$setting->phone}}</td>
                                                            <td>{{$setting->address}}</td>
                                                            <td><a href="edit/settings/{{$setting->id}}" class="btn btn-success">{{__('messages.Edit')}}</a></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
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