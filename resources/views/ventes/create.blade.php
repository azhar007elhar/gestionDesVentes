{{-- @extends('layout') --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Vente</h1>

        <form action="{{ route('ventes.store') }}" method="POST">
            @csrf
    
            @include('ventes.form')
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">Add Vente</button>
    
        </form>
    </div>

@endsection
