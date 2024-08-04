<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Cadastro de Livro</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('livros.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" maxlength="40" placeholder="Título" value="{{ old('titulo') }}" />
            </div>

            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" class="form-control" name="editora" id="editora" maxlength="40" placeholder="Editora" value="{{ old('editora') }}" />
            </div>

            <div class="mb-3">
                <label for="edicao" class="form-label">Edição:</label>
                <input type="number" class="form-control" name="edicao" id="edicao" pattern="[0-9]*" maxlength="4" placeholder="Edição" value="{{ old('edicao') }}" />
            </div>

            <div class="mb-3">
                <label for="ano_publicacao" class="form-label">Ano de publicação:</label>
                <input type="text" class="form-control" name="ano_publicacao" id="ano_publicacao" maxlength="4" placeholder="Ano de publicação" value="{{ old('ano_publicacao') }}" />
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="text" class="form-control preco-mask" name="preco" id="preco" placeholder="Preço" value="{{ old('preco') }}" />
            </div>

            <div class="mb-3">
                <label for="assuntos" class="form-label">Assuntos:</label>
                <select name="assuntos[]" class="form-select" multiple>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->id }}">{{ $assunto->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="autores" class="form-label">Autores:</label>
                <select name="autores[]" class="form-select" multiple>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#preco').mask('000.000.000,00', {reverse: true});
        });
    </script>
</body>
</html>
