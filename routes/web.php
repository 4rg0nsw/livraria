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
    return view('welcome');
});

Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');   
Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create');   
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');   
Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');   
Route::delete('/livros/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');   
Route::get('/livros/edit/{id}', [LivroController::class, 'edit'])->name('livros.edit');   
Route::put('/livros/update/{id}', [LivroController::class, 'update'])->name('livros.update');   


Route::get('/autores', [AutorController::class, 'index'])->name('autor.index');  
Route::get('/autor/create', [AutorController::class, 'create'])->name('autor.create');   
Route::post('/autores', [AutorController::class, 'store'])->name('autor.store');   
Route::get('/autor/{id}', [AutorController::class, 'show'])->name('autor.show'); 
Route::delete('/autor/{id}', [AutorController::class, 'destroy'])->name('autor.destroy');
Route::get('/autor/edit/{id}', [AutorController::class, 'edit'])->name('autor.edit');
Route::put('/autor/update/{id}', [AutorController::class, 'update'])->name('autor.update');

Route::get('/assuntos', [AssuntoController::class, 'index'])->name('assunto.index');  
Route::get('/assunto/create', [AssuntoController::class, 'create'])->name('assunto.create');   
Route::post('/assuntos', [AssuntoController::class, 'store'])->name('assunto.store');   
Route::get('/assunto/{id}', [AssuntoController::class, 'show'])->name('assunto.show'); 
Route::delete('/assunto/{id}', [AssuntoController::class, 'destroy'])->name('assunto.destroy');   
Route::get('/assunto/edit/{id}', [AssuntoController::class, 'edit'])->name('assunto.edit');   
Route::put('/assunto/update/{id}', [AssuntoController::class, 'update'])->name('assunto.update');

Route::get('/gerar-relatorio-livros', [RelatorioController::class, 'gerarRelatorioLivros'])->name('relatorio.livro');
Route::get('/gerar-relatorio-autores', [RelatorioController::class, 'gerarRelatorioAutores'])->name('relatorio.autores');
Route::get('/gerar-relatorio-assunto', [RelatorioController::class, 'gerarRelatorioAssunto'])->name('relatorio.assunto');
Route::get('/gerar-relatorio-completo', [RelatorioController::class, 'gerarRelatorioCompleto'])->name('relatorio.completo');

Route::get('/relatorio-livros-assuntos-autores', [RelatorioController::class, 'gerarRelatorioLivrosAssuntosAutores'])->name('relatorio.view');
Route::get('/exportar-relatorio', [RelatorioController::class, 'exportarRelatorio'])->name('exportar-relatorio');
