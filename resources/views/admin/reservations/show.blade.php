@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Reservations')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Reservation Details')}}</li>
            </ol>
          </nav>
        </div>

        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('menu.Reservation Details')}}</h6>
            </div>
              <div class="row" style="padding: 30px">

                  <div class="col-md-6">
                      <div class="col-md-12 mb-3">
                          <label>{{__('menu.Full Name')}}</label>
                          <div class="input-group">
                              <input type="text" class="form-control"  value="{{$reservation->full_name}}" disabled style="background-color: #fff;" />
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="col-md-12 mb-3">
                          <label>{{__('menu.E-mail')}}</label>
                          <div class="input-group">
                              <input type="text" class="form-control" value="{{$reservation->email}}" disabled style="background-color: #fff;" />
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="col-md-12 mb-3">
                          <label>{{__('menu.phone')}}</label>
                          <div class="input-group">
                              <input type="text" class="form-control" value="{{$reservation->phone}}" disabled style="background-color: #fff;" />
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="col-md-12 mb-3">
                          <label>{{__('menu.Branch Name')}}</label>
                          <div class="input-group">
                              <input type="text" class="form-control" value="{{$reservation->branch_name}}" disabled style="background-color: #fff;" />
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="col-md-12 mb-3">
                          <label>{{__('menu.Num Of Persons')}}</label>
                          <div class="input-group">
                              <input type="text" class="form-control" value="{{$reservation->num_of_persons}}" disabled style="background-color: #fff;" />
                          </div>
                      </div>
                  </div>



                  <div class="col-md-6 ">
                      <div class="col-md-12 mb-3">
                      <label>{{__('menu.Date')}}</label>
                      <div class="input-group">
                          <input type="text" class="form-control" value="{{$reservation->date}}" disabled style="background-color: #fff;" />
                      </div>
                      </div>
                  </div>

                  <div class="col-md-6 ">
                      <div class="col-md-12 mb-3">
                      <label>{{__('menu.Time')}}</label>
                      <div class="input-group">
                          <input type="text" class="form-control" value="{{$reservation->time}}" disabled style="background-color: #fff;" />
                      </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="col-md-12 mb-3">
                          <label>{{__('menu.Message')}}</label>
                          <div class="input-group">
                              <textarea cols="30" rows="10" class="form-control" disabled style="resize: none;background-color: #fff;">{{$reservation->message}}</textarea>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 container">
                  <div class=" text-center">
                      @if($reservation->status ==0)
                          <a  onclick="sendMail({{$reservation->id}})" class="btn btn-success" style="color:#fff;">{{__('menu.Approve')}}</a>

                      @else
                          <button class="btn btn-success btn-block" disabled style="color:#ffffff;">{{__('menu.approved')}}</button>
                      @endif
                  </div>
                  </div>

              </div>

























          </div>
        </div>
    </div>
</div>
@endsection
