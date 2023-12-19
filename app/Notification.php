<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $fillable = ['subscripe_id' , 'contact_id' , 'viewed'];

    public function subscriptions(){
        return $this->belongsTo('App\Subscripe' , 'subscripe_id');
    }

    public function contacts(){
        return $this->belongsTo('App\Contact' , 'contact_id');
    }
}
