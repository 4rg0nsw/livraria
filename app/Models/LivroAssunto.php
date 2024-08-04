<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAssunto extends Model
{
    use HasFactory;

    const LIVRO_ID = 'livro_id';
    const ASSUNTO_ID = 'assunto_id';

    const LIVRO_ASSUNTO = 'livro_assunto';

    protected $table = self::LIVRO_ASSUNTO;

    /**
     * @var bool
     */
    public $timestamps = false;
    
    protected $fillable = [
        self::LIVRO_ID,
        self::ASSUNTO_ID
    ];
}
