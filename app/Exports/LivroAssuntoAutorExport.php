<?php

namespace App\Exports;

use App\Models\LivroAssuntoAutor;
use Maatwebsite\Excel\Concerns\FromCollection;

class LivroAssuntoAutorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LivroAssuntoAutor::all();
    }

    public function headings(): array
    {
        // Defina os cabeçalhos do Excel aqui
        return [
            'ID',
            'Título',
            'Editora',
            'Edição',
            'Ano de Publicação',
            'Valor',
            'Assuntos',
            'Autores',
            'Data de Atualização',
            'Data de Criação',
        ];
    }
}
