<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Assunto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Assunto</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" colspan="3" class="text-center">
                        <h3>Detalhes do Assunto</h3>
                    </th>
                </tr>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $assuntoInfo['id'] }}</td>
                    <td>{{ $assuntoInfo['descricao'] }}</td>
                    <td class="d-flex">
                        <form action="{{ route('assunto.destroy', ['id' => $assuntoInfo['id']]) }}" method="POST" class="me-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        <form action="{{ route('assunto.edit', ['id' => $assuntoInfo['id']]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
