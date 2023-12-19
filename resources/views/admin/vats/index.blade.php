@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Vats List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Vats List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('menu.Vat Number')}}</th>
                            <th>{{__('menu.Value')}}</th>
                            <th>{{__('menu.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($vats) > 0)
                        @foreach($vats as $key => $vat)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$vat->vat_number}}</td>
                                <td>{{$vat->value}}</td>
                                <td>
                                    <a href="/admin/vats/edit/{{$vat->id}}" class="btn btn-success">{{__('menu.Edit')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                                <tr><td colspan="5" class="text-center">{{__('menu.No Vats Here')}}</td></tr>
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
