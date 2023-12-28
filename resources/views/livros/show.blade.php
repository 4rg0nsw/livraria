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
    <h1 class="mb-4">Livro</h1>

    <table class="table">
    <thead>
        <tr>
            <th scope="col" colspan="8" rows="8" class="center-cell">
                <h3>Detalhes do Livro</h3>
            </th>
        </tr>
        <tr>
            <th scope="col">Livro ID</th>
            <th scope="col">Título</th>
            <th scope="col">Editora(s)</th>
            <th scope="col">Edição</th>
            <th scope="col">Ano</th>
            <th scope="col">Assunto(s)</th>
            <th scope="col">Autor(es)</th>
            <th scope="col">Preço</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $livroInfo['id'] }}</td>
            <td>{{ $livroInfo['titulo'] }}</td>
            <td>{{ $livroInfo['editora'] }}</td>
            <td>{{ $livroInfo['edicao'] }}</td>
            <td>{{ $livroInfo['ano_publicacao'] }}</td>
            <td>{{ $livroInfo['assuntos'] }}</td>
            <td>{{ $livroInfo['autores'] }}</td>
            <td>{{ $livroInfo['preco'] }}</td>
            <td class="button-container">
                <form action="{{ route('livros.destroy', ['id' => $livroInfo['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
                <form action="{{ route('livros.edit', ['id' => $livroInfo['id']]) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-danger">Editar</button>
                </form>
            </td>

        </tr>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
