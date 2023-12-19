@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Bank List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Bank List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('menu.Bank Name')}}</th>
                            <th>{{__('menu.Account Number')}}</th>
                            <th>{{__('menu.IBAN')}}</th>
                            <th>{{__('menu.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($banks) > 0)
                        @foreach($banks as $key => $bank)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bank->bank_name}}</td>
                                <td>{{$bank->account_number}}</td>
                                <td>{{$bank->IBAN}}</td>
                                <td>
                                    <a href="/admin/banks/edit/{{$bank->id}}" class="btn btn-success">{{__('menu.Edit')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                                <tr><td colspan="5" class="text-center">{{__('menu.No Bank Info Here')}}</td></tr>
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
