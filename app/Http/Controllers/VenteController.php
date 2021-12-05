<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Http\Requests\StoreVenteRequest;
use App\Http\Requests\UpdateVenteRequest;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;

use PDF;

class VenteController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth')->except(['index' , 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ventes = Vente::latest()->paginate(10);
        // $ventes = Vente::with('clients', 'produits')->get();
        $ventes = Vente::with('Client', 'Produit')->paginate(100);
        // foreach ($ventes as $key => $vente) {
        //     $vente->client = Client::findOrFail($vente->client_id) ; 
        //     $vente->produit = Produit::findOrFail($vente->produit_id) ; 
        // }

        return view('ventes.index' , ['ventes' => $ventes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $produits = Produit::all();
        return view('ventes.create' , ['clients' => $clients , 'produits' => $produits]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenteRequest $request)
    {
        $data = $request->only(['qtevendu','datevente','prixvendu','client_id','produit_id']);
        $data['qtevendu'] = $data['qtevendu'] ;
        $data['datevente'] = $data['datevente'] ;
        $data['prixvendu'] = $data['prixvendu'] ;

        $data['client_id'] = $data['client_id'] ;
        $data['produit_id'] = $data['produit_id'] ;
        $ventes = Vente::create($data);

        $request->session()->flash('status' , 'Vente was created!!');
        return redirect()->route('ventes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ventes.show', [ 'vente'  => Vente::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $produits = Produit::all();

        $vente = Vente::findOrFail($id);
        return view('ventes.edit',  [
            'vente' => $vente ,'clients' => $clients , 'produits' => $produits
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVenteRequest  $request
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVenteRequest $request, $id)
    {
        $vente = Vente::findOrFail($id);
        $vente->qtevendu = $request->input('qtevendu');
        $vente->datevente = $request->input('datevente');
        $vente->prixvendu = $request->input('prixvendu');
        $vente->client_id = $request->input('client_id');
        $vente->produit_id = $request->input('produit_id');
        $vente->save();

        $request->session()->flash('status' , 'Vente was updated!!');
        return redirect()->route('ventes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        Vente::destroy($id);

        $request->session()->flash('status' , 'Vente was deleted!!');
        return redirect()->route('ventes.index');
    }


    public function venteByProducts(){

        $listProduct = Produit::all();
        foreach ($listProduct as $key => $product) {
            $product->sales = Vente::where('produit_id' , $product->id)->count();
            $product->qty = Vente::where('produit_id' , $product->id)->sum('qtevendu');
        }

        return view('ventes.statistiqueVente', ['listVenteByProducts' => $listProduct]);
    }


    public function facture($client_id){
        $factures = Vente::where('client_id' , $client_id)->with('Client', 'Produit')->get();
        return view('ventes.facture', ['factures' => $factures]);
    }

    public function imprimerFacture($client_id){
        $factures = Vente::where('client_id' , $client_id)->with('Client', 'Produit')->get();

        $pdf = PDF::loadView('ventes.facture', ['factures' => $factures]);
        // return $pdf->stream('facture.pdf');
        $pdf->download('facture.pdf');

        return view('ventes.facture', ['factures' => $factures]);
    }


    public function invoice(){
        $factures = Vente::where('client_id' , 2)->with('Client', 'Produit')->get();
        $produit = Produit::findOrFail(1);
        $pdf = PDF::loadView('ventes.invoice' ,  ['factures' => $factures] );
        return $pdf->download('facture.pdf');

    }

}
