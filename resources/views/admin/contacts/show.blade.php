@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Contacts')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Contacts Details')}}</li>
            </ol>
          </nav>
        </div>

        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('menu.Contacts Details')}}</h6>
            </div>
            <div class="ms-panel-body">
                <div class="col-md-12 mb-3">
                    <label>{{__('menu.Full Name')}}</label>
                    <div class="input-group">
                        <input type="text" class="form-control"  value="{{$contacts->full_name}}" disabled style="background-color: #fff;" />
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label>{{__('menu.E-mail')}}</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{$contacts->email}}" disabled style="background-color: #fff;" />
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label>{{__('menu.Reason')}}</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{$contacts->reason}}" disabled style="background-color: #fff;" />
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label>{{__('menu.Message')}}</label>
                    <div class="input-group">
                        <textarea cols="30" rows="10" class="form-control" disabled style="resize: none;background-color: #fff;">{{$contacts->message}}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{route('contacts.index')}}" class="btn btn-primary">{{__('menu.Back')}}</a>
                    </div>
                </div>

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
