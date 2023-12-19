<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loyality extends Model
{
    protected $table = "loyalities";
    protected $fillable = [
        'loyality_No' ,
        'icon',
        'coupon_discount',
    ];
}
