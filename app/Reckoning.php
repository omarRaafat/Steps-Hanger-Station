<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reckoning extends Model
{
    protected $table = "reckoning";
    protected $fillable = ['total_sales_excluded_tax','steps_fee','vendor_profit','orders','subscribe_id' , 'reference_number' , 'account_number'];
    public function subscriber(){
        return $this->belongsTo('App\Subscripe' , 'subscribe_id');
    }
}
