<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo('App\User');
    }
    public function address(){
        return $this->hasOne('App\Adress');
    }
}
