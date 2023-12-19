<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Branch extends Model
{
    protected $table = "category_branches";
    protected $fillable = [
        'menu_category_id',
        'branch_id'
    ];

    public function categories(){
        return $this->belongsTo('App\Models\Menu_Category' , 'menu_category_id');
    }

    public function branches(){
        return $this->belongsTo('App\Models\Branch' , 'branch_id');
    }
}
