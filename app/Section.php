<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table="sections";
    protected $fillable = [
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
        'image',
    ];
}
