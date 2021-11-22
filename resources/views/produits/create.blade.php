@extends('layout')


@section('content')
    <div class="container">
        <h1>Add Produit</h1>

        <form action="{{ route('produits.store') }}" method="POST">
            @csrf
    
            @include('produits.form')
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">Add Produit</button>
    
        </form>
    </div>

@endsection
