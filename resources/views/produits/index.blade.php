{{-- @extends('layout') --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 style="text-align: center">List des Produits</h1>

        <div class="text-right mb-3">
            <a href="{{ route('produits.create') }}" class="btn btn-success text-right">Ajouter Produit</a>
        </div>

        {{-- <div class="row">
            @forelse ($produits as $produit)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $produit->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><a
                                    href="{{ route('produits.show', ['produit' => $produit->id]) }}">{{ $produit->libelle }}</a>
                            </h4>
                            <p class="card-text">{{ $produit->marque }}</p>
                            <em>{{ $produit->created_at }}</em>

                            <a class="btn btn-warning"
                                href="{{ route('produits.edit', ['produit' => $produit->id]) }}">Edit</a>

                            <form class="form-display" method="POST"
                                action="{{ route('produits.destroy', ['produit' => $produit->id]) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete Produit</button>
                            </form>

                        </div>
                    </div>
                    <br>
                </div>
            @empty
                <span class="badge badge-danger">Not Found</span>
            @endforelse
        </div> --}}


        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Qte Stock</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produits as $produit)
                        <tr>
                            
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="uploads/{{ $produit->image }}" alt="" width="50" height="50"></td>
                            <td>{{ $produit->libelle }}</td>
                            <td>{{ $produit->marque }}</td>
                            <td>{{ $produit->prix }}</td>
                            <td>{{ $produit->qteStock }}</td>

                            <td>
                                <a class="btn btn-outline-primary"
                                    href="{{ route('produits.edit', ['produit' => $produit->id]) }}">Edit</a>
                            </td>
                            <td>
                                <form class="form-display" method="POST"
                                    action="{{ route('produits.destroy', ['produit' => $produit->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger">Delete Produit</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <span class="badge badge-danger">Not Found</span>
                    @endforelse


                </tbody>
            </table>
        </div>

        <nav aria-label="Page">
            {{$produits->links()}}
        </nav>

    </div>

@endsection
