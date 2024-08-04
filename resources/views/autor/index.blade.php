<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Autores</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(isset($autoresInfo) && count($autoresInfo) > 0)
            <table id="autoresTable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Autor ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($autoresInfo as $autor)
                        <tr>
                            <td>{{ $autor['id'] }}</td>
                            <td>{{ $autor['nome'] }}</td>
                            <td><a href="{{ route('autor.show', $autor['id']) }}" class="btn btn-info">Detalhes</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum autor encontrado. Cadastre clicando no link: <a href="{{ route('autor.create') }}">Cadastrar Autor</a></p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#autoresTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</body>
</html>
