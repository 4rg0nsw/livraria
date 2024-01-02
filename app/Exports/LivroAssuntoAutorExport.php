<?php

namespace App\Exports;

use App\Models\LivroAssuntoAutor;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class LivroAssuntoAutorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LivroAssuntoAutor::all()->map(function ($item) {
            return [
                'ID' => $item->livro_id,
                'Título' => $item->titulo,
                'Editora' => $item->editora,
                'Edição' => $item->edicao,
                'Ano de Publicação' => $item->ano_publicacao,
                'Valor' => $item->valor,
                'Assuntos' => $item->assuntos,
                'Autores' => $item->autors,
                'Data de Atualização' => Carbon::parse($item->updated_at)->format('d-m-Y'),
                'Data de Criação' => Carbon::parse($item->created_at)->format('d-m-Y'),
            ];
        });
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
            'Data de Criação'
        ];
    }
}
