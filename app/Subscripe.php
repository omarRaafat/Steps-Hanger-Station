<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscripe extends Model
{
    protected $table = "subscriptions";
    protected $fillable = [
        'store_name' ,
        'store_link' ,
        'company_kind',
        'manager',
        'phone',
        'email',
        'password',
        'status',
        'order_percentage'
    ];

    public function notifications_subscripe(){
        return $this->hasMany('App\Notification');
    } 
}
