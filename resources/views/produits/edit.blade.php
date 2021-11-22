@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit Produit</h1>
        <form method="POST" action="{{ route('produits.update', ['produit' => $produit->id]) }}">
            @csrf
            @method('PUT')

            @include('produits.form')


            <div class="d-grid gap-2">
                <button class="btn btn-block btn-warning" type="submit">Update Produit</button>
            </div>
        </form>
    </div>

@endsection
