@extends('layouts.app')


{{-- {{$produit}} --}}



<h3>Liste Commande</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="nowrap">
            <th scope="col">#</th>
            <th scope="col">qte vendu</th>
            <th scope="col">date vente</th>
            <th scope="col">prix vendu</th>
            <th scope="col">Nom Client</th>
            <th scope="col">Prénom Client</th>
            <th scope="col">Produit</th>
            <th scope="col">Marque</th>
            <th scope="col">Prix Produit</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($factures as $vente)
            <tr>
                <td>{{ $vente->id }}</td>
                <td>{{ $vente->qtevendu }}</td>
                <td>{{ $vente->datevente }}</td>
                <td>{{ $vente->prixvendu }}</td>
                <td>{{ $vente->client->nom }}</td>
                <td>{{ $vente->client->prenom }}</td>
                <td>{{ $vente->produit->libelle }}</td>
                <td>{{ $vente->produit->marque }}</td>
                <td>{{ $vente->produit->prix }}</td>
                <td>{{ $vente->prixvendu * $vente->qtevendu }} DH</td>
            </tr>

        @endforeach
    </tbody>
</table>