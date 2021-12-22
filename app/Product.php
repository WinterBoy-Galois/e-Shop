<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    public function category(){
      return $this->belongsTo('App\Category');
    }
}
