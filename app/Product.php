<?php

namespace App;

// product many to many order

class Product extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_details')
            ->withPivot('quantity', 'discount', 'total_weight', 'ongkir', 'total_price')
            ->withTimestamps();
    }

}
