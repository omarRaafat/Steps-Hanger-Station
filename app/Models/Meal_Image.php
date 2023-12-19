<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal_Image extends Model
{
    protected $table = "meals_images";
    protected $fillable = ['meal_images' , 'menu_meal_id'];

    public function menus(){
        return $this->belongsTo('App\Models\Menu_Meal' , 'menu_meal_id');
    }
}
