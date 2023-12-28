<?php

namespace App\Http\Controllers;

use App\Exports\{
    AssuntoExport,
    AutorExport,
    LivroAssuntoAutorExport,
    LivroExport,
    LivroCompletoExport,
};

use App\Models\LivroAssuntoAutor;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    public function gerarRelatorioLivros()
    {
        return Excel::download(new LivroExport, 'relatorio_livros.xlsx');
    }

    public function gerarRelatorioAutores()
    {
        return Excel::download(new AutorExport, 'relatorio_autores.xlsx');
    }

    public function gerarRelatorioAssunto()
    {
        return Excel::download(new AssuntoExport, 'relatorio_assunto.xlsx');
    }

    public function gerarRelatorioCompleto()
    {
        return Excel::download(new LivroCompletoExport, 'relatorio_completo.xlsx');
    }

    public function gerarRelatorioLivrosAssuntosAutores()
    {
        $relatorioAll = LivroAssuntoAutor::all();
        
        return view('relatorio.index_livros_assuntos_autores', compact('relatorioAll'));
    }

    public function exportarRelatorio()
    {
        return Excel::download(new LivroAssuntoAutorExport, 'relatorio_livros_assuntos_autores.xlsx');
    }
}
