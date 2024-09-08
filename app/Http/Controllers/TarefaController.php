<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Contracts\Service\Attribute\Required;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        //
        $tarefas = Tarefa::latest()->paginate(5);

        return view('tarefas.index',compact('tarefas'))

            ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        //
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'descricao' => 'required',
        ]);
        Tarefa::create($request->all());
        return redirect()->route('tarefas.index')
                        ->with('success','Tarefa criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.show', compact('tarefa'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tarefa = Tarefa::findOrFail($id); // Certifique-se de que a tarefa é encontrada pelo ID
        return view('tarefas.edit', compact('tarefa')); // Passa a tarefa para a view
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa): RedirectResponse
    {
        //
        $request->validate([
            'descricao' => 'required',
        ]);

        $tarefa->update($request->only(['descricao']));

        return redirect()->route('tarefas.index')
                        ->with('success','Tarefa atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa): RedirectResponse
    {
        //
        $tarefa->delete();
        return redirect()->route('tarefas.index')
                        ->with('success','Tarefa excluída com sucesso.');
    }
}
