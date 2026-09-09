@extends('layouts.app')

@section('title', 'Painel do Administrador')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md border-l-4 border-red-600">
    <div class="flex items-center space-x-3 mb-4">
        <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full uppercase">Área Restrita: Admin</span>
    </div>
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Painel de Administração</h1>
    <p class="text-gray-600 mb-6">Bem-vindo, {{ Auth::user()->name }}! Você possui privilégios totais de Administrador no sistema.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4 bg-gray-50 rounded border">
            <h3 class="font-bold text-gray-700 mb-1">Gerenciar Alunos</h3>
            <p class="text-sm text-gray-500 mb-3">Cadastrar, visualizar, editar e excluir registros de alunos.</p>
            <a href="{{ route('alunos.index') }}" class="text-blue-600 text-sm font-medium hover:underline">Ir para Alunos &rarr;</a>
        </div>
        <div class="p-4 bg-gray-50 rounded border">
            <h3 class="font-bold text-gray-700 mb-1">Relatórios do Sistema</h3>
            <p class="text-sm text-gray-500 mb-3">Consultar estatísticas de matrículas e cursos.</p>
            <a href="{{ url('/consultas/quantidade') }}" class="text-blue-600 text-sm font-medium hover:underline">Total de Alunos &rarr;</a>
        </div>
    </div>
</div>
@endsection