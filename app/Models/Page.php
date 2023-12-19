<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    protected $table = "pages";
    protected $fillable = [
        'title_en' , 'title_ar' ,'description_en' , 'description_ar' , 'media_type','image','color','section_arrange'
    ];

    public function scopeSectionTitle(){
        return $this->{'title_'.App::getLocale()} ;
    }

    public function scopeSectionDesc(){
        return $this->{'description_'.App::getLocale()} ;
    }
    public function getImageAttribute($image){
        return Storage::disk('s3')->url("images/".$image);
    }

}
