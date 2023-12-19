<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $table = "newsletters";
    protected $fillable = ['email'];
}
