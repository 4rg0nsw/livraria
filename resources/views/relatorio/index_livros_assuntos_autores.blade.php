<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h4 class="mb-4">Relatório Livros, Assuntos e Autores</h4>
        <div class="mb-4">
            <a href="{{ route('exportar-relatorio') }}" class="btn btn-primary">Exportar para Excel</a>
        </div>

        <table id="relatorioTable" class="table table-striped table-bordered">
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
                        <td>{{ $value->autors }}</td>
                        <td>{{ $value->updated_at->format('d-m-Y') }}</td>
                        <td>{{ $value->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#relatorioTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/Portuguese-Brasil.json'
                }
            });
        });
    </script>
</body>
</html>
