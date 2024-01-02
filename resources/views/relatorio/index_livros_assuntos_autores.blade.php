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

    <h4>Relatório Livros, Assuntos e Autores</h4>
    <div>
        <a href="{{ route('exportar-relatorio') }}" class="btn btn-primary">Exportar para Excel</a>
    </div>

<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano de Publicação</th>
                <th>Valor</th>
                <th>Assuntos</th>
                <th>Autores</th>
                <th>Data de Atualização</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorioAll as $value)
                <tr>
                    <td>{{ $value->livro_id }}</td>
                    <td>{{ $value->titulo }}</td>
                    <td>{{ $value->editora }}</td>
                    <td>{{ $value->edicao }}</td>
                    <td>{{ $value->ano_publicacao }}</td>
                    <td>{{ $value->valor }}</td>
                    <td>{{ $value->assuntos }}</td>
<<<<<<< HEAD
                    <td>{{ $value->autors }}</td>
                    <td>{{ $value->updated_at->format('d-m-Y') }}</td>
                    <td>{{ $value->created_at->format('d-m-Y') }}</td>
=======
                    <td>{{ $value->autores }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td>{{ $value->created_at }}</td>
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
                </tr>
            @endforeach
        </tbody>
    </table>
</div>