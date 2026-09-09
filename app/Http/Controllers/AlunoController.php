<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Listar alunos (index)
     */
    public function index()
    {
        $alunos = Aluno::latest()->get();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Exibir formulário de cadastro (create)
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Salvar novo aluno no banco de dados com validações do AlunoRequest (store)
     */
    public function store(AlunoRequest $request)
    {
        Aluno::create($request->validated());

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Exibir detalhes de um aluno (show)
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Exibir formulário de edição (edit)
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Atualizar dados de um aluno com validações do AlunoRequest (update)
     */
    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->validated());

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remover um aluno do banco de dados (destroy)
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}