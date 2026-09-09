<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfileController;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Support\Facades\Route;

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

// TEMA 2 - ATV 4 & TEMA 7 - ATV 13: 7 rotas principais de CRUD com AlunoController
Route::resource('alunos', AlunoController::class);

// TEMA 5 - ATV 11: Consultas Eloquent
Route::prefix('consultas')->group(function () {
    Route::get('/curso/{curso}', function ($curso) {
        $alunos = Aluno::doCurso($curso)->get();
        return response()->json([
            'consulta' => "Alunos do curso: {$curso}",
            'total' => $alunos->count(),
            'dados' => $alunos,
        ]);
    });

    Route::get('/busca/{palavra}', function ($palavra) {
        $alunos = Aluno::nomeContem($palavra)->get();
        return response()->json([
            'consulta' => "Alunos cujo nome contém: {$palavra}",
            'total' => $alunos->count(),
            'dados' => $alunos,
        ]);
    });

    Route::get('/recentes', function () {
        $alunos = Aluno::recentes()->get();
        return response()->json([
            'consulta' => 'Alunos cadastrados recentemente (últimos 30 dias)',
            'total' => $alunos->count(),
            'dados' => $alunos,
        ]);
    });

    Route::get('/quantidade', function () {
        return response()->json([
            'consulta' => 'Quantidade total de alunos',
            'quantidade' => Aluno::quantidade(),
        ]);
    });
});

// TEMA 9 - DESAFIO: Visualizar todos alunos de um curso (Relacionamento Eloquent)
Route::get('/cursos/{curso}/alunos', function (Curso $curso) {
    $curso->load('alunos');
    return view('cursos.alunos', compact('curso'));
})->name('cursos.alunos');

// TEMA 10 - ATV 18: Rotas do Laravel Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// TEMA 11 - ATV 21: Middleware CheckRole protegendo /admin e /professor
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:professor,admin'])->group(function () {
    Route::get('/professor', function () {
        return view('professor.dashboard');
    })->name('professor.dashboard');
});