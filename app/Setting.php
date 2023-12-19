<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'breif_ar',
        'breif_en',
        'about_us_ar',
        'about_us_en',
        'email',
        'phone',
        'address',
        'twitter',
        'facebook',
        'instagram'
    ];
}
