<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product(){
        return $this->hasMany('App\Product');
    }
}
