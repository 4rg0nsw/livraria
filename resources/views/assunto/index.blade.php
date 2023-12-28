<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assunto</title>
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

    <h1 class="mb-4">Assunto</h1>

    @if(isset($assuntoInfo) && count($assuntoInfo) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="3" rows="3" class="center-cell">
                        <h3>Listar Assuntos</h3>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Livro ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assuntoInfo as $assunto)
                    <tr>
                        <th scope="row">{{ $assunto['id'] }}</th>
                        <td>{{ $assunto['descricao'] }}</td>
                        <td><a href="{{ route('assunto.show', $assunto['id']) }}">Detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum assunto encontrado. Cadastre clicando no link: <a href="{{route('assunto.create')}}"> Cadastrar Assunto</a></p>
    @endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
