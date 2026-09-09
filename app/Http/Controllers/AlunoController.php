<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
     * Exibir formulário de cadastro (create) - Apenas Admin (ATV 23)
     */
    public function create()
    {
        Gate::authorize('create', Aluno::class);

        return view('alunos.create');
    }

    /**
     * Salvar novo aluno no banco de dados (store) - Apenas Admin (ATV 23)
     */
    public function store(AlunoRequest $request)
    {
        Gate::authorize('create', Aluno::class);

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
     * Exibir formulário de edição (edit) - Admin e Professor podem editar (ATV 23)
     */
    public function edit(Aluno $aluno)
    {
        Gate::authorize('update', $aluno);

        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Atualizar dados de um aluno (update) - Admin e Professor podem editar (ATV 23)
     */
    public function update(AlunoRequest $request, Aluno $aluno)
    {
        Gate::authorize('update', $aluno);

        $aluno->update($request->validated());

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remover um aluno do banco de dados (destroy) - Apenas Admin pode excluir (ATV 23)
     */
    public function destroy(Aluno $aluno)
    {
        Gate::authorize('delete', $aluno);

        $aluno->delete();

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}