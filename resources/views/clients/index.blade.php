@extends('layout')

@section('content')
    <div class="container">
        <br>
        <h1 style="text-align: center">List des Clients</h1>
        <br>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Telephone</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                        <tr>
                            <th scope="row">{{ $client->id }}</th>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>
                            <td>{{ $client->tele }}</td>

                            <td>
                                <a class="btn btn-outline-primary"
                                    href="{{ route('clients.edit', ['client' => $client->id]) }}">Edit</a>
                            </td>
                            <td>
                                <form class="form-display" method="POST"
                                    action="{{ route('clients.destroy', ['client' => $client->id]) }}">
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

        <nav aria-label="Page">
            {{$clients->links()}}
        </nav>
        
    </div>

@endsection
