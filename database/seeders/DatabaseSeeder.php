<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seeders de Usuários (Admin e Professor para os Temas 10, 11 e 12)
        User::firstOrCreate(
            ['email' => 'admin@escola.com'],
            [
                'name' => 'Administrador Geral',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'professor@escola.com'],
            [
                'name' => 'Professor Carlos Silva',
                'role' => 'professor',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Cursos para relacionamento com alunos (Tema 9)
        $curso1 = Curso::firstOrCreate(
            ['codigo' => 'ES-01'],
            [
                'nome' => 'Engenharia de Software',
                'descricao' => 'Curso de formação de engenheiros e arquitetos de software.',
            ]
        );

        $curso2 = Curso::firstOrCreate(
            ['codigo' => 'CC-02'],
            [
                'nome' => 'Ciência da Computação',
                'descricao' => 'Curso focado em fundamentos da computação e algoritmos.',
            ]
        );

        // 3. Seeder de Alunos (Tema 6 - ATV 12: 10 alunos)
        $this->call([
            AlunoSeeder::class,
        ]);

        // 4. Associar alunos aos cursos (Tema 9)
        Aluno::take(5)->update(['curso_id' => $curso1->id]);
        Aluno::skip(5)->take(5)->update(['curso_id' => $curso2->id]);
    }
}