@extends('layouts.app')

@section('title', 'Página Inicial - Sistema Escolar')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Bem-vindo ao Sistema Escolar</h1>
    <p class="text-gray-600 mb-6">Gerencie cursos, turmas e alunos de maneira rápida e organizada.</p>
    <a href="{{ route('alunos.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">
        Ver Lista de Alunos
    </a>
</div>
@endsection