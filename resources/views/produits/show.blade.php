{{-- @extends('layout')  --}}

@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-4 p-2 m-2">
        <div class="card" style="width: 18rem;">
            <img src="{{ $produit->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('produits.show', ['produit' => $produit->id]) }}">{{ $produit->libelle }}</a></h4>
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

</div>

@endsection