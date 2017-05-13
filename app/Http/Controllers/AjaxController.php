<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Costumer;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        return json_encode($product);
    }

    public function getCostumer($id)
    {
        $costumer = Costumer::find($id);
        return json_encode($costumer);
    }
}
