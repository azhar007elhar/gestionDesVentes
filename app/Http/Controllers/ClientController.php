<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClient;
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
        $client = Client::latest()->paginate(10);
        return view('clients.index' , ['clients' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        $data = $request->only(['nom','prenom','tele']);
        $data['nom'] = $data['nom'] ;
        $data['prenom'] = $data['prenom'] ;
        $data['tele'] = $data['tele'] ;
        $clients = Client::create($data);

        $request->session()->flash('status' , 'Client was created!!');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clients.show', [ 'client'  => Client::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit',  [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClient $request, $id )
    {
        $client = Client::findOrFail($id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->tele = $request->input('tele');
        $client->save();

        $request->session()->flash('status' , 'Client was updated!!');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        Client::destroy($id);

        $request->session()->flash('status' , 'Client was deleted!!');
        return redirect()->route('clients.index');
    }
}
