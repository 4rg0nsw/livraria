<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAssuntoAutor extends Model
{
    use HasFactory;

    const VIEW_LIVROS_ASSUNTOS_AUTORES = 'view_livros_assuntos_autores';
    protected $table = self::VIEW_LIVROS_ASSUNTOS_AUTORES;

    
}
