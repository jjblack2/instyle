<?php

namespace App;

// Order many to many product

class Order extends Model
{
    public $timestamps = false;
    protected $dates = ['order_date'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_details')
            ->withPivot('quantity', 'add_cost', 'total_weight', 'total_price')
            ->withTimestamps();
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
