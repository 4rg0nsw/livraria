<?php

namespace App\Services;

use App\Http\Requests\LivroStoreUpdateRequest;
use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\LivroAssunto;
use App\Models\LivroAutor;
use App\Traits\ApiResponser;

/**
 * Class AcaoService
 * @package App\Services
 */
class LivroService
{
    use ApiResponser;

    protected $livro;
    protected $autor;
    protected $assunto;
    protected $livroAutor;
    protected $livroAssunto;
    
    public function __construct(Livro $livro, LivroAutor $livroAutor, LivroAssunto $livroAssunto, Autor $autor, Assunto $assunto)
    {
        $this->livro = $livro;
        $this->autor = $autor;
        $this->assunto = $assunto;
        $this->livroAutor = $livroAutor;
        $this->livroAssunto = $livroAssunto;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        try {
            
            $livros = $this->livro->get();

            if ($livros->count() >= 1) {
                foreach ($livros as $livro) {
                    $descricaoAssuntos = $livro->assuntos->pluck('descricao')->toArray();
                    $descricaoAutores = $livro->autores->pluck('nome')->toArray();
                    $livroInfo = [
                        'id' => $livro->id,
                        'titulo' => $livro->titulo,
                        'editora' => $livro->editora,
                        'preco' => $livro->valor,
                        'edicao' => $livro->edicao,
                        'ano_publicacao' => $livro->ano_publicacao,
                        'assuntos' => implode(', ', $descricaoAssuntos),
                        'autores' => implode(', ', $descricaoAutores),
                    ];
                    $livrosInfo[] = $livroInfo;
                }
            }
            
            return view('livros.index', compact('livrosInfo'));
    
        } catch (\Exception $e) {
            return view('livros.index', ['message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $preco = str_replace(['.', ','], ['', '.'], $data['preco']);

        $livro = $this->livro->create([
            'titulo' => $data['titulo'],
            'editora' => $data['editora'],
            'edicao' => $data['edicao'],
            'ano_publicacao' => $data['ano_publicacao'],
            'valor' => $preco
        ]);

        if(isset($data['autores']) && $data['autores']):
            foreach($data['autores'] as $autorId):
                $this->livroAutor->create([
                    'livro_id' => $livro['id'],
                    'autor_id' => $autorId
                ]);
            endforeach; 
        endif;

        if(isset($data['assuntos']) && $data['assuntos']):
            foreach($data['assuntos'] as $assuntoId):
                $this->livroAssunto->create([
                    'livro_id' => $livro['id'],
                    'assunto_id' => $assuntoId
                ]);
            endforeach; 
        endif;

        return redirect()->route('livros.index')
            ->with('message', 'Livro cadastrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = $this->livro->find($id);

        if(!$livro)
            return redirect()->route('livros.index');

            $descricaoAssuntos = $livro->assuntos->pluck('descricao')->toArray();
            $descricaoAutores = $livro->autores->pluck('nome')->toArray();
            
            $livroInfo = [
                'id' => $livro->id,
                'titulo' => $livro->titulo,
                'editora' => $livro->editora,
                'edicao' => $livro->edicao,
                'ano_publicacao' => $livro->ano_publicacao,
                'assuntos' => implode(', ', $descricaoAssuntos),
                'autores' => implode(', ', $descricaoAutores),
                'preco' => $livro->valor
            ];

        return view('livros.show', compact('livroInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = $this->livro->find($id);
        $autores = $this->autor->all();
        $assuntos = $this->assunto::all();
        
        if(!$livro)
            return redirect()->back();

            $descricaoAutores = $livro->autores->pluck('nome')->toArray();
            $descricaoAssuntos = $livro->assuntos->pluck('descricao')->toArray();

            $livroInfo = [
                'id' => $livro->id,
                'titulo' => $livro->titulo,
                'editora' => $livro->editora,
                'edicao' => $livro->edicao,
                'ano_publicacao' => $livro->ano_publicacao,
                'assuntos' => implode(', ', $descricaoAssuntos),
                'autores' => implode(', ', $descricaoAutores),
                'preco' => $livro->valor
            ];

            return view('livros.edit', compact('livroInfo', 'autores', 'assuntos'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $data = $request->all();
        $livro = $this->livro->find($id);

        $preco = str_replace(['.', ','], ['', '.'], $data['preco']);

        if ($livro) {
            $livro->update([
                'titulo' => $data['titulo'],
                'editora' => $data['editora'],
                'edicao' => $data['edicao'],
                'ano_publicacao' => $data['ano_publicacao'],
                'valor' => $preco
            ]);

            $livroAutor = $this->livroAutor->where('livro_id', $id)->get();
            if ($livroAutor->isNotEmpty()) {
                $this->livroAutor->where('livro_id', $id)->delete();
            }

            $livroAssunto = $this->livroAssunto->where('livro_id', $id)->get();
            if ($livroAssunto->isNotEmpty()) {
                $this->livroAssunto->where('livro_id', $id)->delete();
            }
            
            if(isset($data['autores']) && $data['autores']):
                foreach ($data['autores'] as $autorId) {
                    $this->livroAutor->updateOrCreate(
                        [   
                            'livro_id' => $id, 
                            'autor_id' => $autorId
                        ]
                    );

                }
            endif;

            if(isset($data['assuntos']) && $data['assuntos']):
                foreach ($data['assuntos'] as $assuntoId) {
                    $this->livroAssunto->updateOrCreate(
                        [
                            'livro_id' => $id, 
                            'assunto_id' => $assuntoId
                        ]
                    );
                }
            endif;

            return redirect()->route('livros.index')
                ->with('message', 'Livro atualizado com sucesso');
        } else {
            return redirect()->back();
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
        $livro = $this->livro->find($id);

        if(!$livro)
            return redirect()->route('livros.index');

        $livro->delete();

        return redirect()->route('livros.index')
            ->with('message', 'Livro deletado com sucesso');
    }
}
