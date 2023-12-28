<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoStoreUpdateRequest;
use App\Models\Assunto;
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
            // Tratar a exceção aqui
            return view('assunto.index', ['message' => $e->getMessage()]);
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
        $data = $request->all();

        $assunto = Assunto::create([
            'descricao' => $data['descricao'],
        ]);

        return redirect()->route('assunto.index')
            ->with('message', 'Assunto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assunto = Assunto::find($id);

        if(!$assunto)
            return redirect()->route('assunto.index');

            $assuntoInfo = [
                'id' => $assunto->id,
                'descricao' => $assunto->descricao
            ];

        return view('assunto.show', compact('assuntoInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assunto = Assunto::find($id);

        if(!$assunto)
            return redirect()->back();

            $assuntoInfo = [
                'id' => $assunto->id,
                'descricao' => $assunto->descricao
            ];

        return view('assunto.edit', compact('assuntoInfo'));
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
        $assunto = Assunto::find($id);

        if(!$assunto)
            return redirect()->route('assunto.index');

        $assunto->delete();

        return redirect()->route('assunto.index')
            ->with('message', 'Assunto deletado com sucesso');
    }
}
