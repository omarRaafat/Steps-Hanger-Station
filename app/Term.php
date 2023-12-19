<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = "terms";
    protected $fillable = ['term_ar' , 'term_en'];
}
