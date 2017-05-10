<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Shipper;
use Session;

class ShipperController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');

        $this->middleware('auth');
    }

    public function index()
    {
        $shippers = Shipper::orderBy('id', 'asc')->paginate(10);
        return view('shippers.index')->withShippers($shippers);
    }

    public function store(Request $request)
    {
        // validate the input
        $this->validate($request, [
            'shipper_name' => 'required|max:50',
        ]);

        // store in the database
        $shipper = new Shipper;

        $shipper->shipper_name = $request->shipper_name;
        $shipper->save();

        Session::flash('success', 'Ekspedisi berhasil ditambah.');

        // redirect to another page
        return redirect()->route('shippers.index');
    }

    public function destroy($id)
    {
        $shipper = Shipper::find($id);

        $shipper->delete();

        Session::flash('success', 'Ekspedisi berhasil dihapus.');

        return redirect()->route('shippers.index');
    }
}
