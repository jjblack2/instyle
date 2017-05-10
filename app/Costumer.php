<?php

namespace App;

class Costumer extends Model
{
    // protected $table = 'costumers';

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
