<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Branch extends Model
{
    protected $table = "branches";
    protected $fillable = [
        'branch_name_ar',
        'branch_name_en',
        'branch_description_ar',
        'branch_description_en',
        'branch_location',
        'area',
        'working_hours_from',
        'working_hours_to',
        'working_days',
    ];

    public function menus(){
        return $this->hasMany('App\Models\Menu_Branch');
    }

    public function categories(){
        return $this->hasMany('App\Models\Category_Branch');
    }

    public function scopeBranchName(){
        return $this->{'branch_name_'.App::getLocale()} ;

    }

    public function scopeBranchDesc(){
        return $this->{'branch_description_'.App::getLocale()} ;

    }

}
