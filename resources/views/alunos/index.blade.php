@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Alunos Matriculados</h1>
        <a href="{{ route('alunos.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded">
            + Cadastrar Aluno
        </a>
    </div>
    <p class="text-gray-600">Página de listagem de alunos.</p>
</div>
@endsection