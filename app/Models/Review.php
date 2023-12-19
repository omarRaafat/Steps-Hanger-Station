<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    protected $fillable = [
        'user_id',	'meal_id','review'
    ];

    public function meal(){
        return $this->belongsTo('\App\Models\Menu_Meal' , 'meal_id');
    }
    public function user(){
        return $this->belongsTo('\App\Models\User' , 'user_id');
    }
}
