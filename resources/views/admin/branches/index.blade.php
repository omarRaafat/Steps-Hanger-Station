@extends('layouts.admin_container')
@section('content')

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Branches List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Branches List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('menu.Name')}}</th>
                        <th>{{__('menu.City')}}</th>
                        <th>{{__('menu.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($branches) > 0)
                        @foreach($branches as $key => $branch)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$branch->branch_name_ar}}</td>
                                <td>{{$branch->city}}</td>
                                <td>
                                    <a href="/admin/branches/edit/{{$branch->id}}" class="btn btn-success">{{__('menu.Edit')}}</a>
                                    <a data-swal-template="#my-templateAr{{$branch->id}}" class="btn btn-danger" style="color:#fff;">{{__('menu.Delete')}}</a>
                                </td>
                            </tr>
                            <template id="my-templateAr{{$branch->id}}">
                              <swal-title>
                                  هل تريد مسح  هذا الفرع؟
                              </swal-title>
                              <swal-icon type="warning" color="red"></swal-icon>
                              <swal-button type="confirm">
                                  <a href="/admin/branches/delete/{{$branch->id}}" style="color:white;">حذف</a>
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
                                <tr><td colspan="5" class="text-center">{{__('menu.No Branches Here')}}</td></tr>
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
