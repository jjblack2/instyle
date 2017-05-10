<?php

namespace App;

class Category extends Model
{
    // protected $table = 'categories';

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
