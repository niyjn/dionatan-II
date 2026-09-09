<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * TEMA 7 - ATV 13: Listar alunos (index)
     */
    public function index()
    {
        $alunos = Aluno::latest()->get();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * TEMA 7 - ATV 13: Exibir formulário de cadastro (create)
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * TEMA 7 - ATV 13: Salvar novo aluno no banco de dados (store)
     */
    public function store(Request $request)
    {
        Aluno::create($request->only(['nome', 'email', 'matricula', 'curso']));

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * TEMA 7 - ATV 13: Exibir detalhes de um aluno (show)
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * TEMA 7 - ATV 13: Exibir formulário de edição (edit)
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * TEMA 7 - ATV 13: Atualizar dados de um aluno (update)
     */
    public function update(Request $request, Aluno $aluno)
    {
        $aluno->update($request->only(['nome', 'email', 'matricula', 'curso']));

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * TEMA 7 - ATV 13: Remover um aluno do banco de dados (destroy)
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()
            ->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}