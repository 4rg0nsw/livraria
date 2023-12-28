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
            <thead>
            <tr>
                <th scope="col" colspan="8" rows="8" class="center-cell">
                    <h3>Atualizar Livro</h3>
                </th>
            </tr>
                <tr>
                    <th scope="col">Livro ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('assunto.update', ['id' => $assuntoInfo['id']]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <tr>
                        <th scope="row">{{ $assuntoInfo['id'] }}</th>
                        <th scope="row"><input type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{ $assuntoInfo['descricao'] }}" /></th>
                        <th scope="row">            
                                <button type="submit" class="btn btn-danger">Atualizar</button>
                        </th>
                    </tr>
                </form>
            </tbody>
        </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
