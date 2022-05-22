<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceManufacturer;
use App\Models\DeviceModel;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::paginate(5)->withQueryString();

        return view('device.index', compact('devices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deviceManufacturers = DeviceManufacturer::all();
        $deviceModels = DeviceModel::all();

        return view('device.create', compact('deviceManufacturers','deviceModels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'device_manufacturer_id' => 'required|integer',
            'device_model_id' => 'required|integer',
        ], [
            'device_manufacturer_id.required' => 'The device manufacturer field is required.',
            'device_model_id.required' => 'The device model field is required.',
        ]);
        $device = new Device();
        $device->manufacturer_id = $request->input('device_manufacturer_id');
        $device->model_id = $request->input('device_model_id');
        $device->save();

        return redirect('/device')->with('completed', 'Device has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::findOrFail($id);
        $deviceManufacturers = DeviceManufacturer::all();
        $deviceModels = DeviceModel::all();

        return view('device.edit', compact('device','deviceManufacturers','deviceModels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeData = $request->validate([
            'device_manufacturer_id' => 'required|integer',
            'device_model_id' => 'required|integer',
        ]);
        /** @var Device $device */
        $device = Device::query()->findOrFail($id);
        $device->manufacturer_id = $request->input('device_manufacturer_id');
        $device->model_id = $request->input('device_model_id');
        $device->save();

        return redirect('/device')->with('success', 'Device has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::destroy($id);

        return redirect('/device')->with('success', 'Device has been deleted!');
    }

}
