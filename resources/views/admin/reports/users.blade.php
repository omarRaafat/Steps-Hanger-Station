@extends('layouts.admin_container')
@section('content')
<meta name="_token" content="{{ csrf_token() }}">


<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
                <li class="breadcrumb-item" aria-current="page">{{__('menu.Reports')}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{__('menu.Users')}}</li>
            </ol>
            </nav>
        </div>

        <div class="col-md-6 pt-4 searchName">
        <label>{{__('menu.Search By Username')}}</label>
            <input type="text" placeholder="Search By Username" name="search" id="search" class="form-control">
        </div>

        <div class="col-md-6 pt-4 searchDate">
        <label>{{__('menu.Search By Date')}}</label>
            <input type="date" placeholder="Search By Date" name="order_date" id="order_date" class="form-control">
        </div>

        <div class="col-md-12 pt-4">
            <div id="prinitingArea">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>{{__('menu.Users Statistics')}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive text-center">
                            <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                <th scope="col">{{__('menu.Username')}}</th>
                                <th scope="col">{{__('menu.E-mail')}}</th>
                                <th scope="col">{{__('menu.Phone')}}</th>
                                <th scope="col">{{__('menu.City')}}</th>
                                <th scope="col">{{__('menu.Address')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->city == null ? 'no city' : $user->city}}</td>
                                        <td>{{$user->address == null ? 'no address' : $user->address}}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center">{{__('menu.No Users Here')}}</td></tr>
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button onclick="printDiv('prinitingArea')" class="btn btn-primary">{{__('menu.Print Users Data')}}</button>
      </div>
    </div>
</div>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'csrftoken' : '{{ csrf_token() }}' }
    });
</script>
<script type="application/javascript">
    $(document).ready(function(){
        // $('#Choose_Search_Type').on('change' , function(e){
        //     var value = e.target.value;
        //     if(value == 1){
        //         $('.searchName').css('display' , 'block');
        //         $('.searchDate').css('display' , 'none');

        //     }else{
        //         $('.searchDate').css('display' , 'block');
        //         $('.searchName').css('display' , 'none');

        //     }
        // });
        $('#search').on('keyup',function(){
            $value=$(this).val();

            $.ajax({
                type : 'GET',
                url : "{{route('search.byUsername')}}",
                data:{'search':$value},
                success:function(data){
                    $('tbody').empty();
                    $('tbody').html(data);
                }
            });
        });

        $('#order_date').on('change' , function(){
            var valueDate = $(this).val();

            $.ajax({
                type : 'GET',
                url : "{{route('search.byUsersDate')}}",
                data:{'order_date':valueDate},
                success:function(data){
                    $('tbody').empty();
                    $('tbody').html(data);
                }
            });
        })
    });
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
</script>
@endsection
