<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Device;
use App\Models\Order;
use App\Models\Part;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5)->withQueryString();
        $clients = Client::all();

        return view('order.index', compact('orders', 'clients'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $devices = Device::all();
        $parts = Part::all();

        return view('order.create', compact('clients', 'devices', 'parts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'client_id' => 'required|integer',
            'device_id' => 'required|integer',
            'price' => 'required|numeric',
            'parts' => 'nullable|array',
        ]);
        $order = new Order();
        $order->client_id = $request->input('client_id');
        $order->device_id = $request->input('device_id');
        $order->price = $request->input('price');
        $order->save();

        $order->parts()->attach($request->input('parts', []));

        return redirect('/order')->with('success', 'Order has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $devices = Device::all();
        $parts = Part::all();

        return view('order.edit', compact('order','clients', 'devices', 'parts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeData = $request->validate([
            'client_id' => 'required|integer',
            'device_id' => 'required|integer',
            'price' => 'required|numeric',
            'parts' => 'nullable|array',
        ]);
        $order = Order::query()->findOrFail($id);
        $order->client_id = $request->input('client_id');
        $order->device_id = $request->input('device_id');
        $order->price = $request->input('price');
        $order->is_done = $request->input('is_done', false);
        $order->save();

        $order->parts()->sync($request->input('parts', []));

        return redirect('/order')->with('success', 'Order has been updated!');
    }
}
