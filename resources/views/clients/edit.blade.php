@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>
        <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
            @csrf
            @method('PUT')

            @include('clients.form')


            <div class="d-grid gap-2">
                <button class="btn btn-block btn-warning" type="submit">Update Client</button>
            </div>
        </form>
    </div>

@endsection
