<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    const ID = 'id';
    const TITULO = 'titulo';
    const EDITORA = 'editora';
    const EDICAO = 'edicao';
    const ANO_PUBLICACAO = 'ano_publicacao';
    const VALOR = 'valor';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';

    const TAB_LIVROS = 'livros';

    protected $table = self::TAB_LIVROS;

    /**
     * @var string
     */
    protected $primaryKey = self::ID;

    protected $dates = [
        self::UPDATED_AT,
        self::CREATED_AT
    ];

    protected $fillable = [
        self::ID,
        self::TITULO,
        self::EDITORA,
        self::EDICAO,
        self::ANO_PUBLICACAO,
        self::VALOR,
        self::UPDATED_AT,
        self::CREATED_AT
    ];


    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'livro_id', 'assunto_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_id', 'autor_id');
    }

}
