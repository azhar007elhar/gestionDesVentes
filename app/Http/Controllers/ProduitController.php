<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduit;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit = Produit::latest()->paginate(5);
        return view('produits.index' , ['produits' => $produit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduit $request)
    {
        $data = $request->only(['libelle','marque','prix','qteStock','image']);
        $data['libelle'] = $data['libelle'] ;
        $data['marque'] = $data['marque'] ;
        $data['prix'] = $data['prix'] ;
        $data['qteStock'] = $data['qteStock'] ;
        $data['image'] = $data['image'] ;
        $produits = Produit::create($data);

        $request->session()->flash('status' , 'Produit was created!!');
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('produits.show', [ 'produit'  => Produit::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit',  [
            'produit' => $produit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduit $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->libelle = $request->input('libelle');
        $produit->marque = $request->input('marque');
        $produit->prix = $request->input('prix');
        $produit->qteStock = $request->input('qteStock');
        // $produit->image = $request->input('image');
        $produit->save();

        $request->session()->flash('status' , 'Produit was updated!!');
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        Produit::destroy($id);

        $request->session()->flash('status' , 'Product was deleted!!');
        return redirect()->route('produits.index');
    }
}
