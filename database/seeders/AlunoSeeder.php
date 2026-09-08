<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TEMA 6 - ATV 12: Gera 10 alunos
        Aluno::factory()->count(10)->create();
    }
}