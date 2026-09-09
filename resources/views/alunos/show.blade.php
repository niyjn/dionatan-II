@extends('layouts.app')

@section('title', 'Detalhes do Aluno - Sistema Escolar')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Ficha do Aluno</h1>
        <a href="{{ route('alunos.index') }}" class="text-blue-600 hover:underline text-sm">&larr; Voltar para a lista</a>
    </div>

    <div class="border-t border-b py-4 space-y-3">
        <div>
            <span class="text-xs text-gray-500 uppercase tracking-wider block">ID</span>
            <p class="font-semibold text-gray-800">#{{ $aluno->id }}</p>
        </div>
        <div>
            <span class="text-xs text-gray-500 uppercase tracking-wider block">Nome</span>
            <p class="font-semibold text-gray-800 text-lg">{{ $aluno->nome }}</p>
        </div>
        <div>
            <span class="text-xs text-gray-500 uppercase tracking-wider block">E-mail</span>
            <p class="text-gray-700">{{ $aluno->email }}</p>
        </div>
        <div>
            <span class="text-xs text-gray-500 uppercase tracking-wider block">Matrícula</span>
            <p class="font-mono text-gray-800 bg-gray-100 inline-block px-2 py-1 rounded">{{ $aluno->matricula }}</p>
        </div>
        <div>
            <span class="text-xs text-gray-500 uppercase tracking-wider block">Curso</span>
            <p class="text-gray-700">{{ $aluno->curso }}</p>
        </div>
        @if($aluno->cursoRelacionado)
            <div>
                <span class="text-xs text-gray-500 uppercase tracking-wider block">Curso Vinculado (Relacionamento)</span>
                <a href="{{ route('cursos.alunos', $aluno->cursoRelacionado) }}" class="text-blue-600 hover:underline font-semibold">
                    {{ $aluno->cursoRelacionado->nome }} (Ver todos alunos deste curso &rarr;)
                </a>
            </div>
        @endif
        <div>
            <span class="text-xs text-gray-500 uppercase tracking-wider block">Data de Cadastro</span>
            <p class="text-gray-500 text-sm">{{ $aluno->created_at ? $aluno->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-6 flex justify-between items-center">
        @can('update', $aluno)
            <a href="{{ route('alunos.edit', $aluno) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-4 py-2 rounded">
                Editar Cadastro
            </a>
        @endcan

        @can('delete', $aluno)
            <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir este aluno?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded">
                    Excluir
                </button>
            </form>
        @endcan
    </div>
</div>
@endsection