<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Shipper;
use App\Costumer;
use App\Product;

use Carbon\Carbon;
use Session;

class OrderController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale(LC_TIME, 'id_ID.utf8');

        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::orderBy('order_date', 'asc')->paginate(10);
        return view('orders.index')->withOrders($orders);
    }

    public function create()
    {
        $shippers = Shipper::all();
        $costumers = Costumer::all();
        $products = Product::all();

        return view('orders.create')
            ->withShippers($shippers)
            ->withCostumers($costumers)
            ->withProducts($products);
    }

    public function store(Request $request)
    {
        // validate the input
        $this->validate($request, [
            'shipper_id' => 'required|integer',
            'user_id' => 'required|integer',
            'costumer_id' => 'required|integer',
            'order_date' => 'required|date',
            'total_berat' => 'required|numeric',
            'ongkir' => 'required|integer',
            'grand_total' => 'required|integer',
            'warna' => 'required'
        ]);

        // store in the database
        $order = new Order;

        $order->costumer_id = $request->costumer_id;
        $order->user_id = $request->user_id;
        $order->shipper_id = $request->shipper_id;
        $order->order_date = $request->order_date;
        $order->ongkir = $request->ongkir;
        $order->diskon = $request->diskon;
        $order->total_berat = $request->total_berat;
        $order->grand_total = $request->grand_total;

        $order->save();

        $syncData = [];
        $i = 0;
        foreach ($request->product_product_id as $id ) {

            $syncData[$id] = [
                'quantity' => $request->quantity[$i],
                'add_cost' => $request->add_cost[$i],
                'total_weight' => $request->total_weight[$i],
                'warna' => strtoupper($request->warna[$i]),
                'total_price' => $request->total_price[$i]
            ];
            $i++;
        }
        // dd($syncData);
        $order->product()->sync($syncData);

        Session::flash('success', 'Order berhasil ditambah.');

        // redirect to another page
        return redirect()->route('orders.index');
    }

    public function edit($id)
    {
        //find the product in the database and save as a variable
        $order = Order::find($id);
        $shippers = Shipper::all();
        $costumers = Costumer::all();
        $catchShip = [];
        $catchCos = [];

        foreach ($shippers as $shipper) {
            $catchShip[$shipper->id] = $shipper->shipper_name;
        }

        foreach ($costumers as $costumer) {
            $catchCos[$costumer->id] = $costumer->costumer_name;
        }

        //return the view and pass in the variable we previously created
        return view('orders.edit')
            ->withOrder($order)
            ->withShippers($catchShip)
            ->withCostumers($catchCos);
    }

    public function update(Request $request, $id)
    {
        // validate the input data
        $this->validate($request, [
            'shipper_id' => 'required|integer',
            'user_id' => 'required|integer',
            'costumer_id' => 'required|integer',
            'order_date' => 'required|date',
            'total_berat' => 'required|numeric',
            'ongkir' => 'required|integer',
            'grand_total' => 'required|integer'
        ]);

        // save changes the data to database
        $order = Order::find($id);

        $order->costumer_id = $request->costumer_id;
        $order->user_id = $request->user_id;
        $order->shipper_id = $request->shipper_id;
        $order->order_date = $request->order_date;
        $order->ongkir = $request->ongkir;
        $order->diskon = $request->diskon;
        $order->total_berat = $request->total_berat;
        $order->grand_total = $request->grand_total;

        $order->save();

        // set flash data with success message
        Session::flash('success', 'Order berhasil diupdate.');

        // redirect with flash data to products.show
        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        Session::flash('success', 'Order berhasil dihapus.');

        return redirect()->route('orders.index');
    }
}
