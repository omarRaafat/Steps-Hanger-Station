<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Menu_Meal extends Model
{
    protected $table = "menu";
    protected $fillable = [
        'meal_name_ar' ,
        'meal_name_en',
        'meal_description_en',
        'meal_description_ar',
        'meal_price',
        'status',
        'quantity_type',
        'quantity',
        'meal_image',
        'rate',
        'meal_category_id',
        'sku_number'
    ];



    public function scopeMealName(){
        return $this->{'meal_name_'.App::getLocale()} ;
    }

    public function scopeMealDesc(){
        return $this->{'meal_description_'.App::getLocale()};
    }



    public function getStatusAttribute($status){
        return $status =  $status == 1 ? "IN-STOCK !" : "OUT-OF-STOCK";
    }

    public function menu_category(){
        return $this->belongsTo('App\Models\Menu_Category' , 'meal_category_id');
    }

    public function images(){
        return $this->hasMany('App\Models\Meal_Image' , 'menu_meal_id');
    }

    public function carts(){
        return $this->hasMany('App\Models\Cart' , 'meal_id');
    }

    public function getMealImageAttribute($meal_image){
          return Storage::disk('s3')->url("meals/".$meal_image);
    }
}
