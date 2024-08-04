<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LivroController,
    AutorController,
    AssuntoController,
    RelatorioController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('livros.index');
});

// Rotas para livros
Route::prefix('livros')->group(function () {
    Route::get('/', [LivroController::class, 'index'])->name('livros.index');
    Route::get('/create', [LivroController::class, 'create'])->name('livros.create');
    Route::post('/', [LivroController::class, 'store'])->name('livros.store');
    Route::get('/{id}', [LivroController::class, 'show'])->name('livros.show');
    Route::delete('/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');
    Route::get('/edit/{id}', [LivroController::class, 'edit'])->name('livros.edit');
    Route::put('/update/{id}', [LivroController::class, 'update'])->name('livros.update');
});

// Rotas para autores
Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index'])->name('autor.index');
    Route::get('/create', [AutorController::class, 'create'])->name('autor.create');
    Route::post('/', [AutorController::class, 'store'])->name('autor.store');
    Route::get('/{id}', [AutorController::class, 'show'])->name('autor.show');
    Route::delete('/{id}', [AutorController::class, 'destroy'])->name('autor.destroy');
    Route::get('/edit/{id}', [AutorController::class, 'edit'])->name('autor.edit');
    Route::put('/update/{id}', [AutorController::class, 'update'])->name('autor.update');
});

// Rotas para assuntos
Route::prefix('assuntos')->group(function () {
    Route::get('/', [AssuntoController::class, 'index'])->name('assunto.index');
    Route::get('/create', [AssuntoController::class, 'create'])->name('assunto.create');
    Route::post('/', [AssuntoController::class, 'store'])->name('assunto.store');
    Route::get('/{id}', [AssuntoController::class, 'show'])->name('assunto.show');
    Route::delete('/{id}', [AssuntoController::class, 'destroy'])->name('assunto.destroy');
    Route::get('/edit/{id}', [AssuntoController::class, 'edit'])->name('assunto.edit');
    Route::put('/update/{id}', [AssuntoController::class, 'update'])->name('assunto.update');
});

// Rotas para relatórios
Route::prefix('gerar-relatorio')->group(function () {
    Route::get('/livros', [RelatorioController::class, 'gerarRelatorioLivros'])->name('relatorio.livro');
    Route::get('/autores', [RelatorioController::class, 'gerarRelatorioAutores'])->name('relatorio.autores');
    Route::get('/assunto', [RelatorioController::class, 'gerarRelatorioAssunto'])->name('relatorio.assunto');
    Route::get('/completo', [RelatorioController::class, 'gerarRelatorioCompleto'])->name('relatorio.completo');
});

// Rotas para página de relatório
Route::prefix('relatorio')->group(function () {
    Route::get('/livros-assuntos-autores', [RelatorioController::class, 'gerarRelatorioLivrosAssuntosAutores'])->name('relatorio.view');
    Route::get('/exportar', [RelatorioController::class, 'exportarRelatorio'])->name('exportar-relatorio');
});
