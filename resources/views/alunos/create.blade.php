@extends('layouts.app')

@section('title', 'Cadastrar Aluno - Sistema Escolar')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Cadastrar Novo Aluno</h1>
        <a href="{{ route('alunos.index') }}" class="text-blue-600 hover:underline text-sm">&larr; Voltar para a lista</a>
    </div>

    {{-- Exibição de erros gerais do formulário --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded">
            <p class="font-bold mb-1">Por favor, corrija os seguintes erros:</p>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alunos.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('nome') border-red-500 bg-red-50 @enderror"
                   placeholder="Ex: João da Silva">
            @error('nome')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail Institucional</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('email') border-red-500 bg-red-50 @enderror"
                   placeholder="Ex: joao@escola.com">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="matricula" class="block text-sm font-medium text-gray-700 mb-1">Matrícula</label>
            <input type="text" name="matricula" id="matricula" value="{{ old('matricula') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('matricula') border-red-500 bg-red-50 @enderror"
                   placeholder="Ex: MAT-12345">
            @error('matricula')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="curso" class="block text-sm font-medium text-gray-700 mb-1">Curso</label>
            <input type="text" name="curso" id="curso" value="{{ old('curso') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('curso') border-red-500 bg-red-50 @enderror"
                   placeholder="Ex: Engenharia de Software">
            @error('curso')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4 flex justify-end space-x-3">
            <a href="{{ route('alunos.index') }}" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">Cancelar</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">Salvar Aluno</button>
        </div>
    </form>
</div>
@endsection