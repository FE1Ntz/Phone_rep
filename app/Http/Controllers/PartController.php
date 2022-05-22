<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartManufacturer;
use App\Models\PartModel;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::paginate(5)->withQueryString();

        return view('part.index', compact('parts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partManufacturers = PartManufacturer::all();
        $partModels = PartModel::all();
        return view('part.create', compact('partManufacturers','partModels'));
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
            'device_manufacturer_id' => 'required|integer',
            'device_model_id' => 'required|integer',
            'count' => 'required|integer',
        ]);
        $part = new Part();
        $part->name =$request->input('name');
        $part->manufacturer_id = $request->input('device_manufacturer_id');
        $part->model_id = $request->input('device_model_id');
        $part->count = $request->input('count');
        $part->save();

        return redirect('/part')->with('completed', 'Part has been saved!');
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
        return view('part.edit', [
            'part' => Part::query()->findOrFail($id),
            'partManufacturers' => PartManufacturer::all(),
            'partModels' => PartModel::all(),
            'partNames' => [
                "CPU",
                "GPU",
                "Motherboard",
                "RAM",
                "Battery",
                "Camera",
                "HDD",
                "Buttons",
                "Fingerprint sensor",
            ]
        ]);
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
            'device_manufacturer_id' => 'required|integer',
            'device_model_id' => 'required|integer',
            'count' => 'required|integer',
        ]);



        /** @var Part $part */
        $part = Part::query()->findOrFail($id);
        $part->name =$request->input('name');
        $part->manufacturer_id = $request->input('device_manufacturer_id');
        $part->model_id = $request->input('device_model_id');
        $part->count = $request->input('count');
        $part->save();

        return redirect('/part')->with('success', 'Part has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Part::destroy($id);

        return  redirect('/part')->with('success', 'Part has been deleted!');
    }
}
