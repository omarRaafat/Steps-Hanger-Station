<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $table = "settings";
    protected $fillable = [
        'restaurant_name_en','restaurant_name_ar','restaurant_description_en','restaurant_description_ar','location_ar','location_en','email','phone','facebook','instagram','twitter','youtube','opening_days','opening_hours','theme_colour','text_colour','logo','icon' ,'reservation_section',
        'cat_title_en_1','cat_time_from_1','cat_time_to_1','cat_title_en_2','cat_time_from_2','cat_time_to_2','cat_title_en_3','cat_time_from_3','cat_time_to_3','cat_title_en_4','cat_time_from_4','cat_time_to_4','cat_1','cat_2','cat_3','cat_4','footer_logo','header_logo','cat_title_ar_1','cat_title_ar_2','cat_title_ar_3','cat_title_ar_4','about_image'
    ];

    public function scopeResName(){
        return $this->{'restaurant_name_'.App::getLocale()} ;
    }

    public function scopeResDesc(){
        return $this->{'restaurant_description_'.App::getLocale()} ;
    }

    public function scopeLocation(){
        return $this->{'location_'.App::getLocale()} ;
    }

    public function scopeCatTitle1(){
        return $this->{'cat_title_'.App::getLocale().'_1'} ;
    }

    public function scopeCatTitle2(){
        return $this->{'cat_title_'.App::getLocale().'_2'} ;
    }

    public function scopeCatTitle3(){
        return $this->{'cat_title_'.App::getLocale().'_3'} ;
    }

    public function scopeCatTitle4(){
        return $this->{'cat_title_'.App::getLocale().'_4'} ;
    }

    public function getAboutImageAttribute($about_image){
        return Storage::disk('s3')->url("assets/".$about_image);
    }
    public function getHeaderLogoAttribute($about_image){
        return Storage::disk('s3')->url("assets/".$about_image);
    }
    public function getFooterLogoAttribute($footer_logo){
        return Storage::disk('s3')->url("assets/".$footer_logo);
    }
    public function getLogoAttribute($logo){
        return Storage::disk('s3')->url("assets/".$logo);
    }
    public function getIconAttribute($icon){
        return Storage::disk('s3')->url("assets/".$icon);
    }



}
