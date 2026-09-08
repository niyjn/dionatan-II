<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Listagem de alunos (index)';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Formulário de cadastro de aluno (create)';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Aluno cadastrado com sucesso (store)';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Exibindo detalhes do aluno com ID: {$id} (show)";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Formulário de edição do aluno com ID: {$id} (edit)";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Aluno com ID: {$id} atualizado com sucesso (update)";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Aluno com ID: {$id} removido com sucesso (destroy)";
    }
}