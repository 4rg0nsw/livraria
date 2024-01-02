<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoStoreUpdateRequest;
use App\Models\Assunto;
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
=======
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
<<<<<<< HEAD
            $assuntoInfo = Assunto::get();
            return view('assunto.index', compact('assuntoInfo'));
        } catch (\Exception $e) {
            Log::error('Erro ao obter dados do assunto: ' . $e->getMessage());
            return view('assunto.index', ['message' => 'Erro ao obter dados do assunto. Por favor, tente novamente mais tarde.']);
=======
            
            $assuntoInfo = Assunto::get();
            
            return view('assunto.index', compact('assuntoInfo'));
    
        } catch (\Exception $e) {
            // Tratar a exceção aqui
            return view('assunto.index', ['message' => $e->getMessage()]);
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assunto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssuntoStoreUpdateRequest $request)
    {
<<<<<<< HEAD
        try {
            $data = $request->all();
            $assunto = Assunto::create([
                'descricao' => $data['descricao'],
            ]);
            return redirect()->route('assunto.index')->with('message', 'Assunto cadastrado com sucesso');
        } catch (\Exception $e) {
            Log::error('Erro ao cadastrar assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao cadastrar assunto. Por favor, tente novamente mais tarde.');
        }
=======
        $data = $request->all();

        $assunto = Assunto::create([
            'descricao' => $data['descricao'],
        ]);

        return redirect()->route('assunto.index')
            ->with('message', 'Assunto cadastrado com sucesso');
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        try {
            $assunto = Assunto::find($id);

            if (!$assunto) {
                return redirect()->route('assunto.index');
            }
=======
        $assunto = Assunto::find($id);

        if(!$assunto)
            return redirect()->route('assunto.index');
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484

            $assuntoInfo = [
                'id' => $assunto->id,
                'descricao' => $assunto->descricao
            ];

<<<<<<< HEAD
            return view('assunto.show', compact('assuntoInfo'));
        } catch (\Exception $e) {
            Log::error('Erro ao exibir assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao exibir assunto. Por favor, tente novamente mais tarde.');
        }
=======
        return view('assunto.show', compact('assuntoInfo'));
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        try {
            $assunto = Assunto::find($id);

            if (!$assunto) {
                return redirect()->back();
            }
=======
        $assunto = Assunto::find($id);

        if(!$assunto)
            return redirect()->back();
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484

            $assuntoInfo = [
                'id' => $assunto->id,
                'descricao' => $assunto->descricao
            ];

<<<<<<< HEAD
            return view('assunto.edit', compact('assuntoInfo'));
        } catch (\Exception $e) {
            Log::error('Erro ao editar assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao editar assunto. Por favor, tente novamente mais tarde.');
        }
=======
        return view('assunto.edit', compact('assuntoInfo'));
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssuntoStoreUpdateRequest $request, $id)
    {
<<<<<<< HEAD
        try {
            $data = $request->all();
            $assunto = Assunto::find($id);

            if ($assunto) {
                $assunto->update([
                    'descricao' => $data['descricao'],
                ]);
                return redirect()->route('assunto.index')->with('message', 'Assunto atualizado com sucesso');
            } else {
                return redirect()->back();
                // Lógica para tratar quando o assunto não for encontrado
            }
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao atualizar assunto. Por favor, tente novamente mais tarde.');
=======
        $data = $request->all();
        $assunto = Assunto::find($id);

        if ($assunto) {
            $assunto->update([
                'descricao' => $data['descricao'],
            ]);
            return redirect()->route('assunto.index')
                ->with('message', 'Assunto atualizado com sucesso');
        } else {
            return redirect()->back();
            // Lógica para tratar quando o assunto não for encontrado
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
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
<<<<<<< HEAD
        try {
            $assunto = Assunto::find($id);

            if (!$assunto) {
                return redirect()->route('assunto.index');
            }

            if ($assunto->livros()->exists()) {
                return redirect()->route('assunto.index')->with('message', 'Assunto vinculado a livro não pode ser deletado.');
            }

            $assunto->delete();

            return redirect()->route('assunto.index')->with('message', 'Assunto deletado com sucesso');
        } catch (\Exception $e) {
            Log::error('Erro ao deletar assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao deletar assunto. Por favor, tente novamente mais tarde.');
        }
    }
}

=======
        $assunto = Assunto::find($id);

        if(!$assunto)
            return redirect()->route('assunto.index');

        $assunto->delete();

        return redirect()->route('assunto.index')
            ->with('message', 'Assunto deletado com sucesso');
    }
}
>>>>>>> 3fda0293d465dbf37e279f778f492fa7c52c0484
