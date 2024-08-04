<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoStoreUpdateRequest;
use App\Models\Assunto;
use Illuminate\Support\Facades\Log;
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
            $assuntoInfo = Assunto::get();
            return view('assunto.index', compact('assuntoInfo'));
        } catch (\Exception $e) {
            Log::error('Erro ao obter dados do assunto: ' . $e->getMessage());
            return view('assunto.index', ['message' => 'Erro ao obter dados do assunto. Por favor, tente novamente mais tarde.']);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $assunto = Assunto::find($id);

            if (!$assunto) {
                return redirect()->route('assunto.index');
            }

            $assuntoInfo = [
                'id' => $assunto->id,
                'descricao' => $assunto->descricao
            ];

            return view('assunto.show', compact('assuntoInfo'));
        } catch (\Exception $e) {
            Log::error('Erro ao exibir assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao exibir assunto. Por favor, tente novamente mais tarde.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $assunto = Assunto::find($id);

            if (!$assunto) {
                return redirect()->back();
            }

            $assuntoInfo = [
                'id' => $assunto->id,
                'descricao' => $assunto->descricao
            ];

            return view('assunto.edit', compact('assuntoInfo'));
        } catch (\Exception $e) {
            Log::error('Erro ao editar assunto: ' . $e->getMessage());
            return redirect()->route('assunto.index')->with('message', 'Erro ao editar assunto. Por favor, tente novamente mais tarde.');
        }
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

