<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagesServices extends Model
{
    protected $table = "packages_services";
    protected $fillable = ['service_ar' , 'service_en'];
}
