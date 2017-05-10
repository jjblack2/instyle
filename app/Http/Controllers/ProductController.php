<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

use Carbon\Carbon;
use Session;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');

        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('product_id', 'asc')->paginate(10);
        return view('products.index')->withProducts($products);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
        // validate the input
        $this->validate($request, [
            'product_id' => 'bail|required|unique:products|max:8',
            'category_id' => 'required|integer',
            'product_name' => 'required|max:50',
            'product_description' => 'required',
            'product_weight' => 'required|integer',
            'product_price' => 'required|integer',
            'display_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // store in the database
        $product = new Product;

        $product->product_id = strtoupper($request->product_id);
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_article = $request->product_article;
        $product->product_weight = $request->product_weight;
        $product->product_price = $request->product_price;

        // save image
        if ($request->hasFile('display_image')) {
            $image = $request->file('display_image');
            $filename = $product->product_id . '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);

            Image::make($image)->resize(500, 800)->save($location);
            $product->product_image = $filename;
        }

        $product->save();

        Session::flash('success', 'Produk berhasil dibuat.');

        // redirect to another page
        return redirect()->route('products.show', $product->product_id);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->withProduct($product);
    }

    public function edit($id)
    {
        //find the product in the database and save as a variable
        $product = Product::find($id);
        $categories = Category::all();
        $catchCat = [];

        foreach ($categories as $category) {
            $catchCat[$category->id] = $category->category_name;
        }

        //return the view and pass in the variable we previously created
        return view('products.edit')->withProduct($product)->withCategories($catchCat);
    }

    public function update(Request $request, $id)
    {
        // validate the input data
        $this->validate($request, [
            'category_id' => 'required|integer',
            'product_name' => 'required|max:255',
            'product_description' => 'required',
            'product_weight' => 'required|integer',
            'product_price' => 'required|integer'
        ]);

        // save changes the data to database
        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_article = $request->product_article;
        $product->product_weight = $request->product_weight;
        $product->product_price = $request->product_price;

        $product->save();

        // set flash data with success message
        Session::flash('success', 'Produk berhasil diupdate.');

        // redirect with flash data to products.show
        return redirect()->route('products.show', $product->product_id);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::flash('success', 'Produk berhasil dihapus.');

        return redirect()->route('products.index');
    }
}
