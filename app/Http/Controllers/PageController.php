<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.welcome')->withProducts($products);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
