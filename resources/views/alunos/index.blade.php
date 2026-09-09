@extends('layouts.app')

@section('title', 'Lista de Alunos - Sistema Escolar')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Alunos Matriculados</h1>
            <p class="text-sm text-gray-500">Gerenciamento completo de alunos (com proteção de Policies por Role)</p>
        </div>
        {{-- TEMA 12 - ATV 23: Apenas Admin pode ver o botão de cadastrar novo aluno --}}
        @can('create', App\Models\Aluno::class)
            <a href="{{ route('alunos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded shadow transition">
                + Novo Aluno (Admin)
            </a>
        @endcan
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($alunos) && count($alunos) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matrícula</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Curso</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($alunos as $aluno)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $aluno->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $aluno->nome }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aluno->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">{{ $aluno->matricula }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $aluno->curso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                <a href="{{ route('alunos.show', $aluno) }}" class="text-blue-600 hover:text-blue-900">Ver</a>

                                {{-- TEMA 12 - ATV 23: Professor e Admin podem editar --}}
                                @can('update', $aluno)
                                    <a href="{{ route('alunos.edit', $aluno) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                                @endcan

                                {{-- TEMA 12 - ATV 23: Apenas Admin pode excluir --}}
                                @can('delete', $aluno)
                                    <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este aluno?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700">
            <p>Nenhum aluno cadastrado no momento.</p>
        </div>
    @endif
</div>
@endsection