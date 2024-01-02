<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAutor extends Model
{
    use HasFactory;

    const LIVRO_ID = 'livro_id';
    const AUTOR_ID = 'autor_id';

    const LIVRO_AUTOR = 'livro_autor';

    protected $table = self::LIVRO_AUTOR;

    /**
     * @var bool
     */
    public $timestamps = false;
    
    protected $fillable = [
        self::LIVRO_ID,
        self::AUTOR_ID
    ];
}
