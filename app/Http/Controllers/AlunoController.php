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
        // Dados de exemplo para visualização inicial
        $alunos = [
            ['id' => 1, 'nome' => 'Ana Clara Silva', 'email' => 'ana@email.com', 'curso' => 'Engenharia de Software'],
            ['id' => 2, 'nome' => 'Bruno Oliveira', 'email' => 'bruno@email.com', 'curso' => 'Ciência da Computação'],
            ['id' => 3, 'nome' => 'Carlos Eduardo', 'email' => 'carlos@email.com', 'curso' => 'Sistemas de Informação'],
        ];

        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('alunos.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('alunos.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('alunos.index');
    }
}