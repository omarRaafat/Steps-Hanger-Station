<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benifit extends Model
{
    protected $table = "benifits";
    protected $fillable = ['image' , 'title_ar' , 'title_en'];
}
