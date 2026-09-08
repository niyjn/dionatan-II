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

    {{-- Utilizando @if e @foreach conforme ATV 9 --}}
    @if(isset($alunos) && count($alunos) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Curso</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($alunos as $aluno)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $aluno['id'] ?? $aluno->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $aluno['nome'] ?? $aluno->nome }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aluno['email'] ?? $aluno->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aluno['curso'] ?? $aluno->curso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('alunos.show', $aluno['id'] ?? $aluno->id) }}" class="text-blue-600 hover:underline">Ver</a>
                                <a href="{{ route('alunos.edit', $aluno['id'] ?? $aluno->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700">
            <p>Nenhum aluno encontrado no momento.</p>
        </div>
    @endif
</div>
@endsection