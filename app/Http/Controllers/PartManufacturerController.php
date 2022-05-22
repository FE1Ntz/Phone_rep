<?php

namespace App\Http\Controllers;

use App\Models\PartManufacturer;
use Illuminate\Http\Request;

class PartManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $part_manufacturers = PartManufacturer::paginate(5)->withQueryString();

        return view('part_manufacturer.index', compact('part_manufacturers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('part_manufacturer.create');
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
        $part_manufacturer = new PartManufacturer();
        $part_manufacturer->name = $request->input('name');
        $part_manufacturer->save();

        return redirect('/part-manufacturer')->with('success', 'Manufacturer has been saved!');
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
        $part_manufacturer = PartManufacturer::findOrFail($id);

        return view('part_manufacturer.edit', compact('part_manufacturer'));
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
        /** @var PartManufacturer $part_manufacturer */
        $part_manufacturer = PartManufacturer::query()->findOrFail($id);
        $part_manufacturer->name = $request->input('name');
        $part_manufacturer->save();

        return  redirect('/part-manufacturer')->with('success', 'Manufacturer has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PartManufacturer::destroy($id);

        return  redirect('/part-manufacturer')->with('success', 'Manufacturer has been deleted!');
    }
}
