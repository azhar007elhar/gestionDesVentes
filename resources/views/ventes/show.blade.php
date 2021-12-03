{{-- @extends('layout')  --}}
@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-4 p-2 m-2">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('ventes.show', ['vente' => $vente->id]) }}">{{ $vente->qtevendu }}</a></h4>
                <p class="card-text">{{ $vente->qtevendu }}</p>
                <p class="card-text">{{ $vente->datevente }}</p>
                <p class="card-text">{{ $vente->prixvendu }}</p>
                <em>{{ $vente->created_at }}</em>

                <a class="btn btn-warning"
                    href="{{ route('ventes.edit', ['vente' => $vente->id]) }}">Edit</a>

                <form class="form-display" method="POST"
                    action="{{ route('ventes.destroy', ['vente' => $vente->id]) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete Vente</button>
                </form>

            </div>
        </div>
        <br>
    </div>

</div>

@endsection