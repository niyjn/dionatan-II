@extends('layouts.app')

@section('title', 'Cadastrar Aluno - Sistema Escolar')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Cadastrar Novo Aluno</h1>
        <a href="{{ route('alunos.index') }}" class="text-blue-600 hover:underline text-sm">&larr; Voltar para a lista</a>
    </div>

    <form action="{{ route('alunos.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
            <input type="text" name="nome" id="nome" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ex: João da Silva">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail Institucional</label>
            <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ex: joao@escola.com">
        </div>

        <div>
            <label for="matricula" class="block text-sm font-medium text-gray-700 mb-1">Matrícula</label>
            <input type="text" name="matricula" id="matricula" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ex: MAT-12345">
        </div>

        <div>
            <label for="curso" class="block text-sm font-medium text-gray-700 mb-1">Curso</label>
            <input type="text" name="curso" id="curso" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ex: Engenharia de Software">
        </div>

        <div class="pt-4 flex justify-end space-x-3">
            <a href="{{ route('alunos.index') }}" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">Cancelar</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">Salvar Aluno</button>
        </div>
    </form>
</div>
@endsection