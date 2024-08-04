<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assuntos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Assuntos</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(isset($assuntoInfo) && count($assuntoInfo) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" colspan="3" class="text-center">
                            <h3>Listar Assuntos</h3>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assuntoInfo as $assunto)
                        <tr>
                            <th scope="row">{{ $assunto['id'] }}</th>
                            <td>{{ $assunto['descricao'] }}</td>
                            <td><a href="{{ route('assunto.show', $assunto['id']) }}" class="btn btn-info">Detalhes</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                Nenhum assunto encontrado. Cadastre clicando no link: <a href="{{ route('assunto.create') }}" class="alert-link">Cadastrar Assunto</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
