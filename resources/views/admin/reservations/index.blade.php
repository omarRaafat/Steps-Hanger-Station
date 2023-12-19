@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Reservations')}} </a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Reservations')}} </h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive">
                  <table class="table table-hover thead-primary" style="text-align: center">
                  <thead>
{{--                  full_name	email	phone	occasion	branch_name	num_of_persons	date	message	time--}}
                    <tr>
                        <th>#</th>
                        <th>{{__('menu.Client Name')}}</th>
                        <th>{{__('menu.Client Phone')}}</th>
                        <th>{{__('menu.Date')}}</th>
                        <th>{{__('menu.Time')}}</th>
                        <th>{{__('menu.Num Of Persons')}}</th>
                        <th>{{__('menu.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($reservations->count() > 0)
                        @foreach($reservations as $reservation )
                            <tr>
                                <td>{{$reservation->id}}</td>
                                <td>{{$reservation->full_name}}</td>
                                <td>{{$reservation->phone}}</td>
                                <td>{{$reservation->date}}</td>
                                <td>{{$reservation->time}}</td>
                                <td>{{$reservation->num_of_persons}}</td>

                                <td>
                                    @if($reservation->status ==0)
                                    <a  onclick="sendMail({{$reservation->id}})" class="btn btn-success" style="color:#fff;">{{__('menu.Approve')}}</a>

                                    @else
                                        <button class="btn btn-success" disabled style="color:#ffffff;">{{__('menu.approved')}}</button>
                                        @endif
                                    <a href="/admin/reservation/show/{{$reservation->id}}" class="btn btn-primary" style="color:#fff;">{{__('menu.show')}}</a>
                                </td>
                            </tr>
                            <template id="my-template{{$reservation->id}}">
                              <swal-title>
                                  هل تريد إرسال رفض للعميل بالفعل ؟
                              </swal-title>
                              <swal-icon type="warning" color="red"></swal-icon>
                              <swal-button type="confirm">
                                  <a href="#" style="color:white;">نعم</a>
                              </swal-button>
                              <swal-button type="cancel">
                                  إلغاء
                              </swal-button>
                              <swal-param name="allowEscapeKey" value="false" />
                              <swal-param
                                  name="customClass"
                                  value='{ "popup": "my-popup" }' />
                            </template>


{{--                            <template id="my-template2{{$reservation->id}}">--}}
{{--                                <swal-title>--}}
{{--                                    تم إرسال الموافقه للعميل بنجاح--}}
{{--                                </swal-title>--}}
{{--                                <swal-icon type="success" color="success"></swal-icon>--}}

{{--                                <swal-param name="allowEscapeKey" value="false" />--}}
{{--                                <swal-param--}}
{{--                                    name="customClass"--}}
{{--                                    value='{ "popup": "my-popup" }' />--}}
{{--                            </template>--}}
                        @endforeach
                        @else
                                <tr><td colspan="5" class="text-center">{{__('menu.No Resrvations Sent')}}</td></tr>
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
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="application/javascript">
      Swal.bindClickHandler()

      Swal.mixin({
      modal: true,
      confirmButtonColor: '#f9423c',
      }).bindClickHandler('data-swal-template')
  </script>
@endsection
