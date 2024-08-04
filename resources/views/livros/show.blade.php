<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Detalhes do Livro</h1>

        <table class="table table-striped">
            <thead>
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
                    <td class="d-flex gap-2">
                        <form action="{{ route('livros.destroy', ['id' => $livroInfo['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        <a href="{{ route('livros.edit', ['id' => $livroInfo['id']]) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
