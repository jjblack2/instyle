<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class AjaxController extends Controller
{
    public function getAllProducts()
    {
        $product = Product::all();
        return json_encode($product);
    }
}
