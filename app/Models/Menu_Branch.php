<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu_Branch extends Model
{
    protected $table = "menu_branches";
    protected $fillable = [
        'menu_meal_id',
        'branch_id'
    ];

    public function menus(){
        return $this->belongsTo('App\Models\Menu_Meal' , 'menu_meal_id');
    }

    public function branches(){
        return $this->belongsTo('App\Models\Branch' , 'branch_id');
    }
}
