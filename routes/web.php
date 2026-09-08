<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Models\Aluno;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

// TEMA 1 - ATV 1: Rotas simples retornando texto
Route::get('/sobre', function () {
    return 'Página Sobre: Bem-vindo ao sistema!';
});

Route::get('/contato', function () {
    return 'Página de Contato: Entre em contato conosco.';
});

// TEMA 1 - ATV 2: Rotas com parâmetro retornando texto
Route::get('/produto/{id}', function ($id) {
    return "Detalhes do Produto com ID: {$id}";
});

Route::get('/categoria/{id}', function ($id) {
    return "Detalhes da Categoria com ID: {$id}";
});

Route::get('/usuario/{id}', function ($id) {
    return "Detalhes do Usuário com ID: {$id}";
});

// TEMA 2 - ATV 4: 7 rotas principais de CRUD com AlunoController
Route::resource('alunos', AlunoController::class);

// TEMA 5 - ATV 11: Consultas Eloquent
Route::prefix('consultas')->group(function () {
    // 1. Alunos de determinado curso
    Route::get('/curso/{curso}', function ($curso) {
        $alunos = Aluno::doCurso($curso)->get();
        return response()->json([
            'consulta' => "Alunos do curso: {$curso}",
            'total' => $alunos->count(),
            'dados' => $alunos,
        ]);
    });

    // 2. Alunos cujo nome contém determinada palavra
    Route::get('/busca/{palavra}', function ($palavra) {
        $alunos = Aluno::nomeContem($palavra)->get();
        return response()->json([
            'consulta' => "Alunos cujo nome contém: {$palavra}",
            'total' => $alunos->count(),
            'dados' => $alunos,
        ]);
    });

    // 3. Alunos cadastrados recentemente
    Route::get('/recentes', function () {
        $alunos = Aluno::recentes()->get();
        return response()->json([
            'consulta' => 'Alunos cadastrados recentemente (últimos 30 dias)',
            'total' => $alunos->count(),
            'dados' => $alunos,
        ]);
    });

    // 4. Quantidade de alunos
    Route::get('/quantidade', function () {
        return response()->json([
            'consulta' => 'Quantidade total de alunos',
            'quantidade' => Aluno::quantidade(),
        ]);
    });
});