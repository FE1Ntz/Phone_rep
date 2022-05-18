<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.index', compact('clients'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
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
            'last_name' => 'required|max:50',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
        ]);
        $client = new Client();
        $client->first_name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone');
        $client->save();

        return redirect('/client')->with('completed', 'Client has been saved!');
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
        $client = Client::findOrFail($id);

        return view('client.edit', compact('client'));
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
            'last_name' => 'required|max:50',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
        ]);
        /** @var Client $client */
        $client = Client::query()->findOrFail($id);
        $client->first_name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone');
        $client->save();

        return redirect('/client')->with('success', 'Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);

        return  redirect('/client')->with('success', 'Client has been deleted!');
    }
}
