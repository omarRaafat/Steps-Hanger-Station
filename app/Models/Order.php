<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'status','date','cart_ids','subtotal','total_after_discount','total_after_tax','user_id','type', 'time' ,'notes'
    ];


    public function user(){
        return $this->belongsTo('App\Models\User' , 'user_id');
    }

    public function getStatus($status){
       return $status;



    }

    public function scopeStatus(){
        if ($this->status == 0)
            return __("menu.Success");
        else if($this->status == 1)
            return __("menu.Preparing");
        else if($this->status == 2)
            return __("menu.Ready");
        else if($this->status == 3)
            return __("menu.Delivered");
        else
            return __("menu.Canceled");




    }
    public function getTypeAttribute($type){
        return  $type == 1 ? "DriveThrow" : ($type == 2 ? "TakeAway" : "TakeIn");
    }
}
