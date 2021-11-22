@extends('layout')


@section('content')
    <div class="container">
        <h1>Add Client</h1>

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
    
            @include('clients.form')
            
            <button type="submit" class="btn btn-primary btn-lg btn-block">Add Client</button>
    
        </form>
    </div>

@endsection
