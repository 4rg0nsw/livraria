<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


Configuração inicial do projeto

# Instala o projeto
composer create-project --prefer-dist laravel/laravel nome-do-projeto "8.*"

# Gerar key da aplicação
php artisan key:generate

# Altera o timezone da aplicação no arquivo config/app.php
'timezone' => 'America/Sao_Paulo'

-----------------------------------------------------------------------------------------------

# Cria model Livro com migration
php artisan make:model Livro -m

# Cria controller LivroController com os métodos de transação
php artisan make:controller LivroController --resource

# Após criar script da tabela livros rodar migrate
php artisan migrate

# Cria model Assunto com migration
sudo php artisan make:model Assunto -m

# Cria controller AssuntoController com os métodos de transação
php artisan make:controller AssuntoController --resource

# Após criar script da tabela assuntos rodar migrate
php artisan migrate

# Cria model Autor com migration
sudo php artisan make:model Autor -m

# Cria controller AutorController com os métodos de transação
php artisan make:controller AutorController --resource


# Cria model Livro com migration
php artisan make:model Preco -m

# Cria controller LivroController com os métodos de transação
php artisan make:controller PrecoController --resource


# Após criar script da tabela autors rodar migrate
php artisan migrate

# Cria migration de relacionamento entre as tabelas livros e assuntos
php artisan make:migration create_livro_assunto_table

# Após configurar script da tabela livro_assunto rodar migrate
php artisan migrate

# Cria migration de relacionamento entre as tabelas livros e autor
php artisan make:migration create_livro_autor_table

# Após configurar script da tabela livro_autor rodar migrate
php artisan migrate

# Cria model LivroAssunto
php artisan make:model LivroAssunto

# Cria model LivroAutor
php artisan make:model LivroAutor

# Request para tratar entrada de dados do store e update de Livro
php artisan make:request LivroStoreUpdateRequest

# Request para tratar entrada de dados do store e update de Autor
php artisan make:request AutorStoreUpdateRequest

# Request para tratar entrada de dados do store e update de Assunto
php artisan make:request AssuntoStoreUpdateRequest

# Alteração na tabela Livros com adição do campo valor
php artisan make:migration alter_add_campo_valor_a_livros --table=livros

# Após configurar script da tabela livro_autor rodar migrate
php artisan migrate

------------------------------------Configuração do JasperPHP

# Instalação do pacote para gerar relatório
composer require maatwebsite/excel --ignore-platform-req=ext-gd

# Inclusão nas providers config/app.php
Maatwebsite\Excel\ExcelServiceProvider::class,

# Inclusão nas aliases config/app.php
'Excel' => Maatwebsite\Excel\Facades\Excel::class,

# Cria uma classe de exportação simples da classe Livro
php artisan make:export LivroExport --model=Livro

# Cria controller RelatorioController
php artisan make:controller RelatorioController

# Cria uma classe de exportação simples da classe Autor
php artisan make:export AutorExport --model=Autor

-------------------------------------------------------------------------------
# Script para gerar view com o relacionamento de tabelas

CREATE VIEW view_livros_assuntos_autores AS
SELECT
    livros.id AS livro_id,
    livros.titulo,
    livros.editora,
    livros.edicao,
    livros.ano_publicacao,
    livros.valor,
    livros.updated_at,
    livros.created_at,
    GROUP_CONCAT(DISTINCT assuntos.descricao SEPARATOR ', ') AS assuntos,
    GROUP_CONCAT(DISTINCT autors.nome SEPARATOR ', ') AS autors
FROM
    livros
LEFT JOIN livro_assunto ON livros.id = livro_assunto.livro_id
LEFT JOIN assuntos ON livro_assunto.assunto_id = assuntos.id
LEFT JOIN livro_autor ON livros.id = livro_autor.livro_id
LEFT JOIN autors ON livro_autor.autor_id = autors.id
GROUP BY
    livros.id, livros.titulo, livros.editora, livros.edicao, livros.ano_publicacao, livros.valor, livros.updated_at, livros.created_at;
    

#Como o Eloquent não tem suporte pra criação de views, foi usado o DB::statement pra executar o script
php artisan make:migration view_livros_autores_assuntos

# Após configurar script da view view_livros_autores_assuntos rodar migrate
php artisan migrate

--------------------------------------------------------------------------------

# Cria model da view LivroAssuntoAutor
php artisan make:model LivroAssuntoAutor

# Criar um export para o relatório da view
php artisan make:export LivroAssuntoAutorExport --model=LivroAssuntoAutor

php artisan test --filter NomeDoTeste


