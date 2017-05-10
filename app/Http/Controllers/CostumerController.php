<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Costumer;
use Carbon\Carbon;
use Session;

class CostumerController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');

        $this->middleware('auth');
    }

    public function index()
    {
        $costumers = Costumer::orderBy('id', 'asc')->paginate(10);
        return view('costumers.index')->withCostumers($costumers);
    }

    public function create()
    {
        return view('costumers.create');
    }

    public function store(Request $request)
    {
        // validate the input
        $this->validate($request, [
            'costumer_name' => 'required|max:50',
            'costumer_phone' => 'required|unique:costumers|integer',
            'costumer_address' => 'required'
        ]);

        // store in the database
        $costumer = new Costumer;

        $costumer->costumer_name = $request->costumer_name;
        $costumer->costumer_phone = $request->costumer_phone;
        $costumer->costumer_address = $request->costumer_address;
        $costumer->save();

        Session::flash('success', 'Costumer berhasil ditambah.');

        // redirect to another page
        return redirect()->route('costumers.index');
    }

    public function edit($id)
    {
        //find the costumer in the database and save as a variable
        $costumer = Costumer::find($id);

        //return the view and pass in the variable we previously created
        return view('costumers.edit')->withCostumer($costumer);
    }

    public function update(Request $request, $id)
    {
        // validate the input data
        $this->validate($request, [
            'costumer_name' => 'required|max:50',
            'costumer_phone' => 'required|unique:costumers|integer',
            'costumer_address' => 'required'
        ]);

        // save changes the data to database
        $costumer = Costumer::find($id);

        $costumer->costumer_name = $request->costumer_name;
        $costumer->costumer_phone = $request->costumer_phone;
        $costumer->costumer_address = $request->costumer_address;

        $costumer->save();

        // set flash data with success message
        Session::flash('success', 'Costumer berhasil diupdate.');

        // redirect with flash data to products.show
        return redirect()->route('costumers.index');
    }

    public function destroy($id)
    {
        $costumer = Costumer::find($id);

        $costumer->delete();

        Session::flash('success', 'Costumer berhasil dihapus.');

        return redirect()->route('costumers.index');
    }
}
