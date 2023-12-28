<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assunto</title>
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

<h1 class="mb-4">Assunto</h1>

<table class="table">
<tr>
        <th scope="col" colspan="2" rows="2" class="center-cell">
            <h3>Cadastro de Assunto</h3>
        </th>
    </tr>
    <form action="{{ route('assunto.store') }}" method="POST">
        @csrf
        <tr>
            <td>
                <label for="titulo">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="" value="{{ old('descricao') }}" />
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </td>
        </tr>
    </form>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>