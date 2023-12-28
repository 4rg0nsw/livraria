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
    <h2 class="mb-4">Livro</h1>

    <table class="table">
        <tr>
            <th scope="col" colspan="8" rows="8" class="center-cell">
                <h3>Atualizar Livro</h3>
            </th>
        </tr>
    <tbody>
        <form action="{{ route('livros.update', ['id' => $livroInfo['id']]) }}" method="POST">
            @csrf
            @method('PUT')
            <tr>
                <td><label for="titulo">Título:</label></td>
                <td><label for="editora">Editora(s):</label></td>
                <td><label for="edicao">Edição:</label></td>
            </tr>
            <tr>
                <td><input type="text" name="titulo" id="titulo" placeholder="Título" value="{{ $livroInfo['titulo'] }}" /></td>
                <td><input type="text" name="editora" id="editora" placeholder="Editora" value="{{ $livroInfo['editora'] }}" /></td>
                <td><input type="number" name="edicao" id="edicao" placeholder="Edição" value="{{ $livroInfo['edicao'] }}" /></td>
            </tr>
            <tr>
                <td><label for="ano_publicacao">Ano de publicação:</label></td>
                <td><label for="preco">Preço:</label></td>
            </tr>
            <tr>
                <td><input type="number" name="ano_publicacao" id="ano_publicacao" placeholder="Ano de publicação" value="{{ $livroInfo['ano_publicacao'] }}" /></td>
                <td><input type="text" class="form-control preco-mask" name="preco" id="preco" placeholder="Preço" value="{{ $livroInfo['preco'] }}" /></td>
            </tr>
            <tr>
                <td><label for="assuntos">Assunto:</label></td>
                <td><label for="autores">Autor:</label></td>
            </tr>
            
            <tr>    
            <td>
                    <select name="assuntos[]" class="form-select" multiple>
                        @foreach($assuntos as $assunto)
                            <option value="{{ $assunto->id }}" @if(in_array($assunto->descricao, explode(', ', $livroInfo['assuntos']))) selected ? selected : '' @endif>{{ $assunto->descricao }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="autores[]" class="form-select" multiple>
                        @foreach($autores as $autor)
                            <option value="{{ $autor->id }}" @if(in_array($autor->nome, explode(', ', $livroInfo['autores']))) selected ? selected : '' @endif>{{ $autor->nome }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    <button type="submit" class="btn btn-danger">Atualizar</button>
                </td>
            </tr>
        </form>
    </tbody>
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
