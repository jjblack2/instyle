<?php

namespace App;

class Shipper extends Model
{
    // protected $table = 'shippers';

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
