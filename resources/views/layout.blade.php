<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    {{-- <link rel="stylesheet" href="{{ mix('css/theme.css') }}"> --}}
    <title>Gestion Des Ventes</title>
</head>

<body>



    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">Liste Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.create') }}">Create Client</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('produits.index') }}">Liste Produit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('produits.create') }}">Create Produit</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('ventes.index') }}">Liste Vente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ventes.create') }}">Create Vente</a>
            </li>

        </ul>
    </nav>

    {{-- <ul>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('about')}}">About</a></li>
        <li><a href="{{route('posts.create')}}">Create Post</a></li>
    </ul> --}}

    @if (session()->has('status'))
        <h3 style="color: green ; text-align: center">
            {{ session()->get('status') }}
        </h3>
    @endif

    <div class="container">
        @yield('content')
    </div>


    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
