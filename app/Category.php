<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','categoryid'];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
