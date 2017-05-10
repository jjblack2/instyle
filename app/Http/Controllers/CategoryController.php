<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');

        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('category_name', 'asc')->paginate(10);
        return view('categories.index')->withCategories($categories);
    }

    public function store(Request $request)
    {
        // validate the input
        $this->validate($request, [
            'category_name' => 'required|max:50',
        ]);

        // store in the database
        $category = new Category;

        $category->category_name = $request->category_name;
        $category->save();

        Session::flash('success', 'Kategori berhasil ditambah.');

        // redirect to another page
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        Session::flash('success', 'Kategori berhasil dihapus.');

        return redirect()->route('categories.index');
    }
}
