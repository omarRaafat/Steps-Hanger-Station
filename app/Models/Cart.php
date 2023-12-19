<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = [
        'meal_id','price','quantity','total_price','user_id' , 'IP_ADDRESS','status'
    ];

    public function meal(){
        return $this->belongsTo('\App\Models\Menu_Meal' , 'meal_id');
    }
    public function user(){
        return $this->belongsTo('\App\Models\User' , 'user_id');
    }
}
