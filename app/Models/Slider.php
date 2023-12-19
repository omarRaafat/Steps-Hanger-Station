<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $table = "ads";
    protected $fillable = [
        'image','title_ar','description_ar','title_en','description_en'
    ];
    public function getImageAttribute($image){
        return Storage::disk('s3')->url("sliders/".$image);
    }

    public function scopeTitle(){
        return $this->{'title_'.App::getLocale()};
    }

    public function scopeDesc(){
        return $this->{'description_'.App::getLocale()};
    }

}
