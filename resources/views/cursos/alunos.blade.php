@extends('layouts.app')

@section('title', 'Alunos do Curso: ' . $curso->nome)

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6 pb-4 border-b">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider bg-blue-100 text-blue-800 px-2 py-1 rounded">
                Código: {{ $curso->codigo }}
            </span>
            <h1 class="text-3xl font-bold text-gray-800 mt-2">Curso: {{ $curso->nome }}</h1>
            <p class="text-gray-600 mt-1">{{ $curso->descricao ?? 'Sem descrição cadastrada.' }}</p>
        </div>
        <a href="{{ route('alunos.index') }}" class="text-blue-600 hover:underline text-sm font-medium">
            &larr; Voltar para Lista Geral
        </a>
    </div>

    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-700">
            Alunos Matriculados neste Curso ({{ $curso->alunos->count() }})
        </h2>
    </div>

    {{-- Mostrando todos alunos que fazem parte do relacionamento hasMany com Curso --}}
    @if($curso->alunos->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matrícula</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data de Ingresso</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($curso->alunos as $aluno)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-600">{{ $aluno->matricula }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $aluno->nome }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aluno->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $aluno->created_at ? $aluno->created_at->format('d/m/Y') : '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                <a href="{{ route('alunos.show', $aluno) }}" class="text-blue-600 hover:underline">Ver Aluno</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-6 bg-blue-50 border-l-4 border-blue-400 text-blue-700 rounded">
            <p>Nenhum aluno está matriculado neste curso até o momento.</p>
        </div>
    @endif
</div>
@endsection