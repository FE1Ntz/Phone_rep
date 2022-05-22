<?php

namespace App\Http\Controllers;

use App\Models\DeviceManufacturer;
use App\Models\DeviceModel;
use Illuminate\Http\Request;

class DeviceModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deviceModels = DeviceModel::paginate(5)->withQueryString();

        return view('device_model.index', compact('deviceModels'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deviceManufacturers = DeviceManufacturer::all();
        return view('device_model.create' , compact('deviceManufacturers'));
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
            'manufacturer_id' => 'required|integer',
            'name' => 'required|max:50',
        ]);
        $deviceModel = new DeviceModel();
        $deviceModel->manufacturer_id = $request->input('manufacturer_id');
        $deviceModel->name = $request->input('name');
        $deviceModel->save();

        return redirect('/device-model')->with('success', 'Model has been saved!');
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
        $model = DeviceModel::findOrFail($id);
        $deviceManufacturers = DeviceManufacturer::all();

        return view('device_model.edit', compact('model','deviceManufacturers'));
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
        /** @var DeviceModel $deviceModel */
        $deviceModel = DeviceModel::query()->findOrFail($id);
        $deviceModel->manufacturer_id = $request->input('manufacturer_id');
        $deviceModel->name = $request->input('name');
        $deviceModel->save();

        return redirect('/device-model')->with('success', 'Model has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DeviceModel::destroy($id);

        return  redirect('/device-model')->with('success', 'Model has been deleted!');
    }
}
