<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['productid','name','price','category','description'];

    public function Categories()
    {
        return $this->belongsTo('App\Category');
    }
}
