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
                <li class="breadcrumb-item active" aria-current="page">{{__('menu.Meals')}}</li>
            </ol>
            </nav>
        </div>

        <div class="col-md-6 pt-4 searchName">
        <label>{{__('menu.Search By Meal Name')}}</label>
            <input type="text" placeholder="Search By Meal Name" name="search" id="search" class="form-control">
        </div>

        <div class="col-md-6 pt-4 searchDate">
        <label>{{__('menu.Search By Meal Date')}}</label>
            <input type="date" placeholder="Search By Meal Date" name="meal_date" id="meal_date" class="form-control">
        </div>

        <div class="col-md-12 pt-4">
            <div id="prinitingArea">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>{{__('menu.Meals Statistics')}}</h6>
                    </div>
                    <div class="ms-panel-body">
                        <div class="table-responsive text-center">
                            <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                <th scope="col">{{__('menu.Name')}}</th>
                                <th scope="col">{{__('menu.Image')}}</th>
                                <th scope="col">{{__('menu.Price')}}</th>
                                <th scope="col">{{__('menu.Quantity')}}</th>
                                <th scope="col">{{__('menu.Orders')}}</th>
                                <th scope="col">{{__('menu.Category')}}</th>
                                <th scope="col">{{__('menu.Status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($meals) > 0)
                                    @foreach($meals as $meal)
                                    <tr>
                                        <td>{{$meal->meal_name_ar}}</td>
                                        <td>
                                            <img src="{{asset('uploads/meals/' . $meal->images[0]->meal_images)}}" alt="people">
                                        </td>
                                        <td>{{$meal->meal_price}}</td>
                                        <td>{{$meal->quantity}}</td>
                                        <td>{{$meal->carts->sum('quantity')}}</td>
                                        <td>{{@App\Models\Menu_Category::find($meal->meal_category_id)->category_name_ar}}</td>
                                        <td>{{$meal->status}}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center">{{__('menu.No Meals Here')}}</td></tr>
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
        <button onclick="printDiv('prinitingArea')" class="btn btn-primary">{{__('menu.Print Meals Data')}}</button>
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
        $('#search').on('keyup',function(){
            $value=$(this).val();

            $.ajax({
                type : 'GET',
                url : "{{route('search.ByName')}}",
                data:{'search':$value},
                success:function(data){
                    $('tbody').empty();
                    $('tbody').html(data);
                }
            });
        });

        $('#meal_date').on('change' , function(){
            var valueDate = $(this).val();

            $.ajax({
                type : 'GET',
                url : "{{route('search.ByDate')}}",
                data:{'meal_date':valueDate},
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
