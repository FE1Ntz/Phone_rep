<?php

namespace App\Http\Controllers;

use App\Models\DeviceManufacturer;
use Illuminate\Http\Request;

class DeviceManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deviceManufacturers = DeviceManufacturer::paginate(5)->withQueryString();

        return view('device_manufacturer.index', compact('deviceManufacturers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('device_manufacturer.create');
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
            'name' => 'required|max:50',
        ]);
        $client = new DeviceManufacturer();
        $client->name = $request->input('name');
        $client->save();

        return redirect('/device-manufacturer')->with('success', 'Manufacturer has been saved!');
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
        $manufacturer = DeviceManufacturer::findOrFail($id);

        return view('device_manufacturer.edit', compact('manufacturer'));
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
            'name' => 'required|max:50',
        ]);
        /** @var DeviceManufacturer $deviceManufacturer */
        $deviceManufacturer = DeviceManufacturer::query()->findOrFail($id);
        $deviceManufacturer-> name = $request->input('name');
        $deviceManufacturer->save();

        return redirect('/device-manufacturer')->with('success', 'Manufacturer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DeviceManufacturer::destroy($id);

        return  redirect('/device-manufacturer')->with('success', 'Manufacturer has been deleted!');
    }
}
