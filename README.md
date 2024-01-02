<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<<<<<<< HEAD
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======

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


>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
