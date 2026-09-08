<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// TEMA 1 - ATV 1: Rotas simples retornando texto
Route::get('/sobre', function () {
    return 'Página Sobre: Bem-vindo ao sistema!';
});

Route::get('/alunos', function () {
    return 'Página de Alunos: Lista de alunos matriculados.';
});

Route::get('/contato', function () {
    return 'Página de Contato: Entre em contato conosco.';
});
