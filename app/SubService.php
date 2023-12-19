<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $table = "sub_services";
    protected $fillable = [
        'title_ar',
        'title_en',
        'image',
    ];
}
