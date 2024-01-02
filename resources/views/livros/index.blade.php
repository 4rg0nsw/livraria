<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
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

    <h1 class="mb-1">Livros</h1>
    <h4 class="mb-5"></h1>

    @if(isset($livrosInfo) && count($livrosInfo) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="5" rows="5" class="center-cell">
                        <h3>Listar Livros</h3>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Livro ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Autor(es)</th>
                    <th scope="col">Ação </th>
                </tr>
            </thead>
            <tbody>
                @foreach($livrosInfo as $livro)
                    <tr>
                        <th scope="row">{{ $livro['id'] }}</th>
                        <td>{{ $livro['titulo'] }}</td>
                        <td>{{ $livro['preco'] }}</td>
                        <td>{{ $livro['autores'] }}</td>
                        <td><a href="{{ route('livros.show', $livro['id']) }}">Detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum livro encontrado. Cadastre clicando no link: <a href="{{route('livros.create')}}"> Cadastrar Livro</a></p>
    @endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
