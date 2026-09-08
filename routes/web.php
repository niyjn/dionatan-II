<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
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