<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = "coupons";
    protected $fillable = [
        'coupon_code',
        'coupon_discount',
        'coupon_validity',
        'coupon_type',
        'users',
        'fromDate',
        'toDate'
    ];
    protected $dates = ['fromDate', 'toDate'];


    public function getCouponValidityAttribute($coupon_validity){
        return  $coupon_validity == 1 ? "VALID" : "NOT VALID";
    }
}
