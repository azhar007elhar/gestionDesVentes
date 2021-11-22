@extends('layout') 

@section('content')

<div class="container">

    <div class="col-4 p-2 m-2">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('clients.show', ['client' => $client->id]) }}">{{ $client->nom }}</a></h4>
                <p class="card-text">{{ $client->prenom }}</p>
                <em>{{ $client->created_at }}</em>

                <a class="btn btn-warning"
                    href="{{ route('clients.edit', ['client' => $client->id]) }}">Edit</a>

                <form class="form-display" method="POST"
                    action="{{ route('clients.destroy', ['client' => $client->id]) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete Client</button>
                </form>

            </div>
        </div>
        <br>
    </div>

</div>

@endsection