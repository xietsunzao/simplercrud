<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['productid','name','price','category_id','description'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
