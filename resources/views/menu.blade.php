<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Livraria')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Livraria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLivros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Livros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLivros">
                            <li><a class="dropdown-item" href="{{ route('livros.index') }}">Listar Livros</a></li>
                            <li><a class="dropdown-item" href="{{ route('livros.create') }}">Cadastrar Livros</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAutores" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Autores
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAutores">
                            <li><a class="dropdown-item" href="{{ route('autor.index') }}">Listar Autores</a></li>
                            <li><a class="dropdown-item" href="{{ route('autor.create') }}">Cadastrar Autores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAssuntos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Assuntos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAssuntos">
                            <li><a class="dropdown-item" href="{{ route('assunto.index') }}">Listar Assuntos</a></li>
                            <li><a class="dropdown-item" href="{{ route('assunto.create') }}">Cadastrar Assuntos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('relatorio.view') }}">Relatório</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
