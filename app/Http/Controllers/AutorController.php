<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorStoreUpdateRequest;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $autoresInfo = Autor::get();
            
            return view('autor.index', compact('autoresInfo'));

        } catch (\Exception $e) {
            // Tratar a exceção aqui
            return view('autor.index', ['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutorStoreUpdateRequest $request)
    {
        $data = $request->all();

        $autor = Autor::create([
            'nome' => $data['nome'],
        ]);

        return redirect()->route('autor.create')
            ->with('message', 'Autor cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::find($id);

        if(!$autor)
            return redirect()->route('autor.index');

            $autorInfo = [
                'id' => $autor->id,
                'nome' => $autor->nome
            ];

        return view('autor.show', compact('autorInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autor::find($id);

        if(!$autor)
            return redirect()->back();

            $autorInfo = [
                'id' => $autor->id,
                'nome' => $autor->nome
            ];

        return view('autor.edit', compact('autorInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $autor = Autor::find($id);

        if ($autor) {
            $autor->update([
                'nome' => $data['nome'],
            ]);
            return redirect()->route('autor.index')
                ->with('message', 'Autor atualizado com sucesso');
        } else {
            return redirect()->back();
            // Lógica para tratar quando o autor não for encontrado
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
        $autor = Autor::find($id);

        if(!$autor)
            return redirect()->route('autor.index');

        $autor->delete();

        return redirect()->route('autor.index')
            ->with('message', 'Autor deletado com sucesso');
    }
}
