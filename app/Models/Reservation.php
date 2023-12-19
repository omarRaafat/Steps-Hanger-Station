<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";
    protected $fillable = [
        'full_name' ,
        'email' ,
        'phone' ,
        'occasion' ,
        'branch_name' ,
        'num_of_persons' ,
        'date' ,
        'message' ,
        'time',
        'status'

    ];


}
