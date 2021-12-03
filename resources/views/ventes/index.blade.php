{{-- @extends('layout') --}}
@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 style="text-align: center">List des Ventes</h1>

        <div class="text-right mb-3">
            <a href="{{ route('ventes.create') }}" class="btn btn-success text-right">Ajouter Vente</a>
        </div>

        <div class="row">

            <table class="table table-bordered">
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
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ventes as $vente)
                        <tr class="nowrap">
                            <th scope="row">{{ $vente->id }}</th>
                            <td>{{ $vente->qtevendu }}</td>
                            <td>{{ $vente->datevente }}</td>
                            <td>{{ $vente->prixvendu }}</td>
                            <td>{{ $vente->client->nom }}</td>
                            <td>{{ $vente->client->prenom }}</td>
                            <td>{{ $vente->produit->libelle }}</td>
                            <td>{{ $vente->produit->marque }}</td>
                            <td>{{ $vente->produit->prix }}</td>

                            <td>
                                <a class="btn btn-outline-primary"
                                    href="{{ route('ventes.edit', ['vente' => $vente->id]) }}">Edit</a>
                            </td>
                            <td>
                                <form class="form-display" method="POST"
                                    action="{{ route('ventes.destroy', ['vente' => $vente->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger">Delete Client</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <span class="badge badge-danger">Not Found</span>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- <nav aria-label="Page">
            {{$ventes->links()}}
        </nav> --}}

    </div>

@endsection