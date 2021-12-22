<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'Adress', 'Adress_2', 'City', 'State',
        'Zip'
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
