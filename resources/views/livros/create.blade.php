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

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div><hr/></div>

<h1 class="mb-4">Livros</h1>


<table class="table">
    <tr>
        <th scope="col" colspan="8" rows="8" class="center-cell">
            <h3>Cadastro de Livro</h3>
        </th>
    </tr>
    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <tr>
    <td>
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" maxlength="40" placeholder="Título" value="{{ old('titulo') }}" />
    </td>
    <td>
        <label for="editora">Editora:</label>
        <input type="text" class="form-control" name="editora" id="editora" maxlength="40" placeholder="Editora" value="{{ old('editora') }}" />
    </td>
    <td>
        <label for="edicao">Edição:</label>
        <input type="number" class="form-control" name="edicao" id="edicao" pattern="[0-9]*" maxlength="4" placeholder="Edição" value="{{ old('edicao') }}" />
    </td>
</tr>
    <tr>
        <td>
            <label for="ano_publicacao">Ano de publicação:</label>
            <input type="text" class="form-control" name="ano_publicacao" id="ano_publicacao" maxlength="4" placeholder="Ano de publicação" value="{{ old('ano_publicacao') }}" />
        </td>
        <td>
            <label for="preco">Preço:</label>
            <input type="text" class="form-control preco-mask" name="preco" id="preco" placeholder="Preço" value="{{ old('preco') }}" />
        </td>
    </tr>
    <tr>    
        <td>
        <label for="assuntos">Assuntos:</label>
        <select name="assuntos[]" class="form-select" multiple>
            @foreach($assuntos as $assunto)
                <option value="{{ $assunto->id }}">{{ $assunto->descricao }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <label for="autores">Autores:</label>
        <select name="autores[]" class="form-select" multiple>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
            @endforeach
        </select>
    </td>
</tr>
<!-- Linha separadora entre os campos e o botão -->
<tr>
    <td colspan="3"></td>
</tr>
<!-- Linha para o botão de submit -->
<tr>
    <td colspan="3" class="text-center">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </td>
</tr>


    </form>
</table>

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