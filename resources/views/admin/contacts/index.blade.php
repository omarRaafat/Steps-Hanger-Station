@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Contacts List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Contacts List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('menu.Full Name')}}</th>
                            <th>{{__('menu.E-mail')}}</th>
                            <th>{{__('menu.Reason')}}</th>
                            <th>{{__('menu.Message')}}</th>
                            <th>{{__('menu.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($contacts) > 0)
                        @foreach($contacts as $key => $contact)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$contact->full_name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->reason}}</td>
                                <td>{{Str::limit($contact->message , 50)}}</td>
                                <td>
                                    <a href="/admin/contacts/show/{{$contact->id}}" class="btn btn-success">{{__('menu.Show')}}</a>
                                    <a data-swal-template="#my-templateAr{{$contact->id}}" class="btn btn-danger" style="color:#fff;">{{__('menu.Delete')}}</a>
                                </td>
                            </tr>
                            <template id="my-templateAr{{$contact->id}}">
                              <swal-title>
                                  هل تريد مسح  هذا الاستفسار؟
                              </swal-title>
                              <swal-icon type="warning" color="red"></swal-icon>
                              <swal-button type="confirm">
                                  <a href="/admin/contacts/delete/{{$contact->id}}" style="color:white;">حذف</a>
                              </swal-button>
                              <swal-button type="cancel">
                                  إلغاء
                              </swal-button>
                              <swal-param name="allowEscapeKey" value="false" />
                              <swal-param
                                  name="customClass"
                                  value='{ "popup": "my-popup" }' />
                            </template>
                        @endforeach
                        @else
                                <tr><td colspan="5" class="text-center">{{__('menu.No Contacts Here')}}</td></tr>
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
