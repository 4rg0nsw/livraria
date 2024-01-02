<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    const ID = 'id';
    const DESCRICAO = 'descricao';

    const TAB_ASSUNTOS = 'assuntos';

    protected $table = self::TAB_ASSUNTOS;

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
        self::DESCRICAO
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'assunto_id', 'livro_id');
    }

}
