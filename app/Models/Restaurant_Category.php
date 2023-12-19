<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_Category extends Model
{
    protected $table = "restaurant_category";
    protected $fillable = [
        'category_id',
        'restaurant_id'
    ];

    public function menu_categories(){
        return $this->belongsTo('App\Menu_Category' , 'category_id');
    }

    public function restaurants(){
        return $this->belongsTo('App\Restaurant' , 'restaurant_id');
    }
}