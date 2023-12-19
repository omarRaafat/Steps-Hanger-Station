<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhySteps extends Model
{
    protected $table = "whysteps";
    protected $fillable = ['title_ar' , 'title_en' , 'desc_ar' , 'desc_en'];
}
