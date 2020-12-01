<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','categoryid'];

    public function Products()
    {
        return $this->hasMany('App\Product');
    }
}
