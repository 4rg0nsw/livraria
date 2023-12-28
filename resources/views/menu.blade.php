<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#">Livros</a>
                    <div class="submenu">
                    <a class="nav-link" href="{{ route('livros.index') }}"  class="submenu-item">Listar Livros</a>
                    <a class="nav-link" href="{{ route('livros.create') }}"  class="submenu-item">Cadastrar Livros</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Autores</a>
                    <div class="submenu">
                        <a class="nav-link" href="{{ route('autor.index') }}" class="submenu-item">Listar Autores</a>
                        <a class="nav-link" href="{{ route('autor.create') }}" class="submenu-item">Cadastrar Autores</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Assuntos</a>
                    <div class="submenu">
                        <a class="nav-link" href="{{ route('assunto.index') }}" class="submenu-item">Listar Assuntos</a>
                        <a class="nav-link" href="{{ route('assunto.create') }}" class="submenu-item">Cadastrar Assuntos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorio.view') }}" >Relatório</a>
                </li>
            </ul>
        </div>
    </div>
</nav>