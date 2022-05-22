<?php

namespace App\Http\Controllers;

use App\Models\PartManufacturer;
use App\Models\PartModel;
use Illuminate\Http\Request;

class PartModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $part_models = PartModel::paginate(5)->withQueryString();

        return view('part_model.index', compact('part_models'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partManufacturers = PartManufacturer::all();
        return view('part_model.create', compact('partManufacturers'));
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
        $part_model = new PartModel();
        $part_model->name = $request->input( 'name');
        $part_model->save();

        return redirect('/part-model')->with('success', 'Model has been saved!');
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
        $part_model = PartModel::findOrFail($id);

        return view('part_model.edit', compact('part_model'));
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
        /** @var PartModel $part_model */
        $part_model = PartModel::query()->findOrFail($id);
        $part_model->name = $request->input('name');
        $part_model->save();

        return redirect('/part-model')->with('success', 'Model has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PartModel::destroy($id);

        return  redirect('/part-model')->with('success', 'Model has been deleted!');
    }
}
