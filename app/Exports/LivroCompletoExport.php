<?php

namespace App\Exports;

<<<<<<< HEAD
use App\Models\Autor;
=======
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
use App\Models\Livro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LivroCompletoExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Carregar livros com relações
        $livros = Livro::with('assuntos', 'autores')->get();
<<<<<<< HEAD
        //$livros = Autor::with('assuntos', 'livros')->get();
=======
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484

        // Mapear os dados para o formato desejado
        $livrosData = $livros->map(function ($livro) {
            return [
                'ID' => $livro->id,
                'Título' => $livro->titulo,
                'Editora' => $livro->editora,
                'Edição' => $livro->edicao,
                'Ano de Publicação' => $livro->ano_publicacao,
                'Valor' => $livro->valor,
                'Assuntos' => $livro->assuntos->pluck('descricao')->implode(', '), // Concatenar os nomes dos assuntos
                'Autores' => $livro->autores->pluck('nome')->implode(', '), // Concatenar os nomes dos autores
                'Data de Atualização' => $livro->updated_at,
                'Data de Criação' => $livro->created_at,
            ];
        });

        return $livrosData;
    }

    public function headings(): array
    {
        // Definir os cabeçalhos do relatório
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
