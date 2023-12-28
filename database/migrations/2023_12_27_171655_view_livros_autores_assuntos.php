<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class ViewLivrosAutoresAssuntos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
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
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_livros_assuntos_autores');
    }
}
