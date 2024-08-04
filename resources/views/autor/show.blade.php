<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Detalhes do Autor</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" colspan="3" class="text-center">
                        <h3>Informações do Autor</h3>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Autor ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $autorInfo['id'] }}</td>
                    <td>{{ $autorInfo['nome'] }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('autor.destroy', ['id' => $autorInfo['id']]) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja deletar este autor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        <a href="{{ route('autor.edit', ['id' => $autorInfo['id']]) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
