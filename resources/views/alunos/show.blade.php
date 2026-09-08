@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Detalhes do Aluno #{{ $id ?? 1 }}</h1>
    <p class="text-gray-600 mb-4">Visualização dos dados completos do aluno.</p>
    <a href="{{ route('alunos.index') }}" class="text-blue-600 hover:underline">&larr; Voltar para a lista</a>
</div>
@endsection