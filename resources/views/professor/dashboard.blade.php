@extends('layouts.app')

@section('title', 'Painel do Professor')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md border-l-4 border-green-600">
    <div class="flex items-center space-x-3 mb-4">
        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full uppercase">Área do Docente</span>
    </div>
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Painel do Professor</h1>
    <p class="text-gray-600 mb-6">Bem-vindo, {{ Auth::user()->name }}! Aqui você pode acompanhar seus alunos e editar informações pedagógicas.</p>
    <div class="p-4 bg-gray-50 rounded border">
        <h3 class="font-bold text-gray-700 mb-1">Turmas & Alunos</h3>
        <p class="text-sm text-gray-500 mb-3">Acessar a lista de alunos para edição e acompanhamento.</p>
        <a href="{{ route('alunos.index') }}" class="text-blue-600 text-sm font-medium hover:underline">Ver Alunos &rarr;</a>
    </div>
</div>
@endsection