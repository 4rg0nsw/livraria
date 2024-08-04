<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    const ID = 'id';
    const NOME = 'nome';

    const TAB_AUTORS = 'autors';

    protected $table = self::TAB_AUTORS;

    /**
     * @var string
     */
    protected $primaryKey = self::ID;

    /**
     * @var bool
     */
    public $timestamps = false;
    
    protected $fillable = [
        self::ID,
        self::NOME
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_autor', 'autor_id', 'livro_id');
    }
}
