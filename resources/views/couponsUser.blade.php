@extends('layouts.child')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-danger">Welcome {{$customer->user->username}}</h3>
            <h5 class="text-danger">
                Now Your Loyality_Orders_Numbers => {{$customer->loyality_order_No}}
                <p>To Get Gift You Must Request Orders To ( {{$loyalities->loyality_No}} ) Orders</p>
            </h5>
        </div>
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
                <th>Loyality_Order_No</th>
                <th>Loyality_No</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$customer->loyality_order_No}}</td>
                    <td>{{$loyalities->loyality_No}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        @if($customer->loyality_order_No == $loyalities->loyality_No)
            <h3 class="text-danger">لأنك عميل مميز لقد حصلت علي هدية خصم علي طلبك القادم بنسبة %{{$loyalities->coupon_discount}} </h3>
            <p class="text-danger">كود الخصم : <span class="codeCoupon"></span></p>
        @else
            <h3 class="text-danger">Request More Orders To Get Gift</h3>
        @endif
    </div>
</div>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
    function makeid(length) {
        var result           = 'LOY';
        var characters       = '0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
    return result;
    }
    $(document).ready(function(){
        $('.codeCoupon').html(makeid(4));
    });
</script>
@endsection