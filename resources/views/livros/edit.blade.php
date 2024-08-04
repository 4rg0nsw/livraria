<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('menu')

    <div class="container mt-4">
        <h1 class="mb-4">Atualizar Livro</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('livros.update', ['id' => $livroInfo['id']]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" value="{{ $livroInfo['titulo'] }}" />
            </div>

            <div class="mb-3">
                <label for="editora" class="form-label">Editora(s):</label>
                <input type="text" class="form-control" name="editora" id="editora" placeholder="Editora" value="{{ $livroInfo['editora'] }}" />
            </div>

            <div class="mb-3">
                <label for="edicao" class="form-label">Edição:</label>
                <input type="number" class="form-control" name="edicao" id="edicao" placeholder="Edição" value="{{ $livroInfo['edicao'] }}" />
            </div>

            <div class="mb-3">
                <label for="ano_publicacao" class="form-label">Ano de publicação:</label>
                <input type="number" class="form-control" name="ano_publicacao" id="ano_publicacao" placeholder="Ano de publicação" value="{{ $livroInfo['ano_publicacao'] }}" />
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="text" class="form-control preco-mask" name="preco" id="preco" placeholder="Preço" value="{{ $livroInfo['preco'] }}" />
            </div>

            <div class="mb-3">
                <label for="assuntos" class="form-label">Assunto:</label>
                <select name="assuntos[]" class="form-select" multiple>
                    @foreach($assuntos as $assunto)
                        <option value="{{ $assunto->id }}" @if(in_array($assunto->descricao, explode(', ', $livroInfo['assuntos']))) selected @endif>{{ $assunto->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="autores" class="form-label">Autor:</label>
                <select name="autores[]" class="form-select" multiple>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" @if(in_array($autor->nome, explode(', ', $livroInfo['autores']))) selected @endif>{{ $autor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
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
