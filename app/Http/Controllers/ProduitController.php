<?php

namespace App\Http\Controllers;

use App\Exports\ProduitsExport;
use App\Http\Requests\StoreProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProduitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit = Produit::latest()->paginate(10);
        return view('produits.index', ['produits' => $produit]);
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

        if ($request->hasFile('image')) {
            $data = $request->input('image');
            $photo = $request->file('image')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('image')->move($destination, $photo);
            $input = $request->all();
            $input['image'] = $photo;

            // $data['image'] = $photo ;


            // $extension = $request->file('image')->getClientOriginalExtension();
            // $size = $request->file('image')->getSize();


            $produits = Produit::create($input);

            $request->session()->flash('status', 'Produit was created!!');
            return redirect()->route('produits.index');
        }

        // $data = $request->only(['libelle','marque','prix','qteStock','image']);
        // $data['libelle'] = $data['libelle'] ;
        // $data['marque'] = $data['marque'] ;
        // $data['prix'] = $data['prix'] ;
        // $data['qteStock'] = $data['qteStock'] ;

        // $produits = Produit::create($input);

        // $request->session()->flash('status' , 'Produit was created!!');
        // return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('produits.show', ['produit'  => Produit::findOrFail($id)]);
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
        $produit->image = $request->input('image');

        $produit->save();

        $request->session()->flash('status', 'Produit was updated!!');
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Produit::destroy($id);

        $request->session()->flash('status', 'Product was deleted!!');
        return redirect()->route('produits.index');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ProduitsExport, 'produits.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new ProduitsExport, request()->file('file'));

        return back();
    }
}
