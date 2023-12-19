<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
   protected $table = "vats";
   protected $fillable = ['vat_number' , 'value'];
}
