{{-- @extends('layout') --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Vente</h1>
        <form method="POST" action="{{ route('ventes.update', ['vente' => $vente->id]) }}">
            @csrf
            @method('PUT')

            @include('ventes.form')


            <div class="d-grid gap-2">
                <button class="btn btn-block btn-warning" type="submit">Update Vente</button>
            </div>
        </form>
    </div>

@endsection
