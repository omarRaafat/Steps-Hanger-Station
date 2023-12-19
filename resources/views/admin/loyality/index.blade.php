@extends('layouts.admin_container')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

<div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Loyality List')}}</a></li>
            </ol>
          </nav>

        <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>{{__('menu.Loyality List')}}</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive text-center">
                  <table class="table table-hover thead-primary">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('menu.Loyality No')}}</th>
                        <th scope="col">{{__('menu.Coupon Discount')}}</th>
                        <th scope="col">{{__('menu.Icon')}}</th>
                        <th scope="col">{{__('menu.Actions')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(count($presents) > 0)
                        @foreach($presents as $key => $present)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$present->loyality_No}}</td>
                            <td>% {{$present->coupon_discount}}</td>
                            <td><i class="{{$present->icon}}"></i></td>
                            <td>
                                <a href="/admin/loyality/edit/{{$present->id}}" class="btn btn-success">{{__('menu.Edit')}}</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr><td colspan="5" class="text-center">{{__('menu.No Loyalities Here')}}</td></tr>
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
