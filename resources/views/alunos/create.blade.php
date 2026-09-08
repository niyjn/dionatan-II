@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Novo Cadastro de Aluno</h1>
    <p class="text-gray-600 mb-4">Formulário de cadastro de aluno.</p>
    <a href="{{ route('alunos.index') }}" class="text-blue-600 hover:underline">&larr; Voltar para a lista</a>
</div>
@endsection