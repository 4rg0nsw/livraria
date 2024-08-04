<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    use HasFactory;

    const ID = 'id';
    const VALOR = 'valor';

    const TAB_PRECOS = 'precos';

    protected $table = self::TAB_PRECOS;

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
        self::VALOR
    ];
}
