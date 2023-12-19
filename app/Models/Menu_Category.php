<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Menu_Category extends Model
{
    protected $table = "menu_category";
    protected $fillable = [
        'category_name_en' ,
        'category_name_ar' ,
    ];

    public function scopeCategoryName(){
        return $this->{"category_name_".App::getLocale()};
    }

    public function menu_meals(){
        return $this->hasMany('App\Models\Menu_Meal');
    }

    public function restaurant_categories(){
        return $this->hasMany('App\Models\Restaurant_Category');
    }
}
