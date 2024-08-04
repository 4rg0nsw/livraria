<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroStoreUpdateRequest;
use App\Models\Assunto;
use App\Models\Autor;
use App\Services\LivroService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LivroController extends Controller
{
    protected $livroService;
    
    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $livros = $this->livroService->index();

            return $livros;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.create', compact('autores', 'assuntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroStoreUpdateRequest $request)
    {
        try {
            
            DB::beginTransaction();
            $data = $request->all();

            $livro = $this->livroService->store($data);
            DB::commit();

            return $livro;
        } catch (\Exception $e) {
            
            DB::rollBack();
            Log::error($e);

            return 'Erro interno do servidor';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livros = $this->livroService->show($id);

        return $livros;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $livros = $this->livroService->edit($id);

        return $livros;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LivroStoreUpdateRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $livro = $this->livroService->update($request, $id);
            DB::commit();
    
            return $livro;
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error($e);
    
            return 'Erro interno do servidor';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            DB::beginTransaction();
            $livro = $this->livroService->destroy($id);
            DB::commit();
    
            return $livro;
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error($e);
    
            return 'Erro interno do servidor';
        }
    }
}
