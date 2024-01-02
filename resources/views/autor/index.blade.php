<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@section('content')
    @include('menu')


<div><hr/></div>

    @if(session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <h1 class="mb-4">Autor(es)</h1>

    @if(isset($autoresInfo) && count($autoresInfo) > 0)
        <table class="table">
            
            <thead>
            <tr>
                <th scope="col" colspan="5" rows="5" class="center-cell">
                    <h3>Lista de Autores</h3>
                </th>
            </tr>
                <tr>
                    <th scope="col">Livro ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autoresInfo as $autor)
                    <tr>
                        <th scope="row">{{ $autor['id'] }}</th>
                        <td>{{ $autor['nome'] }}</td>
                        <td><a href="{{ route('autor.show', $autor['id']) }}">Detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum autor encontrado. Cadastre clicando no link: <a href="{{route('autor.create')}}"> Cadastrar Autor</a></p>
    @endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
