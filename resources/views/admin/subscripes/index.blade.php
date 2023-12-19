@extends('admin.index')
@section('main')
<style>
    .swal2-shown {
        overflow: unset !important;
        padding-right: 0px !important;
    }
    .dropbtn {
  background-color: #495057;
  color: white;
  padding: 10px;
  font-size: 14px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2A3042;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 80px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Subscriptions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Subscriptions')}}</li>
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
                                                <tr>
                                                    <th data-priority="2">{{__('messages.Store Name')}}</th>
                                                    <th data-priority="2">{{__('messages.Store Link')}}</th>
                                                    <th data-priority="2">{{__('messages.E-mail')}}</th>
                                                    <th data-priority="2">{{__('messages.Company')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($subscripes) > 0)
                                                @foreach($subscripes as $subscripe)
                                                    <tr>
                                                        <td>{{$subscripe->store_name}}</td>
                                                        <td>
                                                            @if($subscripe->status == 1)
                                                                <a href="https://{{$subscripe->store_name}}.steps-sa.co"  target="_blank">{{$subscripe->store_link}}</a>
                                                            @else
                                                                {{$subscripe->store_link}}
                                                            @endif
                                                        </td>
                                                        <td>{{$subscripe->email}}</td>
                                                        <td>{{$subscripe->company_kind}}</td>
                                                        <td>
                                                        <div class="dropdown">
                                                            <button data-id="{{$subscripe->id}}" class="dropbtn"><i class="fas fa-ellipsis-v"></i></button>
                                                            <div id="myDropdown{{$subscripe->id}}" class="dropdown-content">
                                                                @if($subscripe->status == 0)
                                                                    <a href="show/subscripes/{{$subscripe->id}}" class="btn btn-primary dropdown-item">{{__('messages.Show')}}</a>
                                                                @else
                                                                    <a href="show/subscripes/{{$subscripe->id}}" class="btn btn-primary dropdown-item disabled" style="background-color:#fff;border-color:#cecaca;color:#000;">{{__('messages.Verified')}}</a>
                                                                @endif
                                                                <a href="edit/subscripes/{{$subscripe->id}}" class="btn btn-success dropdown-item">{{__('messages.Edit')}}</a>
                                                                <a data-swal-template="#my-template{{$subscripe->id}}" class="btn btn-danger dropdown-item">{{__('messages.Delete')}}</a>
                                                            </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <template id="my-template{{$subscripe->id}}">
                                                        <swal-title>
                                                            هل تريد حذف هذا الاشتراك؟
                                                        </swal-title>
                                                        <swal-icon type="warning" color="red"></swal-icon>
                                                        <swal-button type="confirm">
                                                            <a href="{{route('subscripes.delete' , ['language' => app()->getLocale() , 'id' => $subscripe->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.dropbtn').on('click' , function(e){
            console.log(e.target.getAttribute('data-id'));
            var id = e.target.getAttribute('data-id');
            document.getElementById("myDropdown"+id).classList.toggle("show");
        });
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <script>
        Swal.bindClickHandler()

        Swal.mixin({
        modal: true,
        }).bindClickHandler('data-swal-template')
    </script>
@endsection
