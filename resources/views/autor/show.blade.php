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
    <h1 class="mb-4">Autor</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col" colspan="3" rows="3" class="center-cell">
                    <h3>Detalhes do Autor</h3>
                </th>
            </tr>
                <tr>
                    <th scope="col">Livro ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <th scope="row">{{ $autorInfo['id'] }}</th>
                    <th scope="row">{{ $autorInfo['nome'] }}</th>

                    <th scope="row" class="button-container">
                        <form action="{{ route('autor.destroy', ['id' => $autorInfo['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        <form action="{{ route('autor.edit', ['id' => $autorInfo['id']]) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    </th>

                    </tr>
            </tbody>
        </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
