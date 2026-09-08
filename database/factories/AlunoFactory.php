<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'matricula' => 'MAT-' . fake()->unique()->numerify('#####'),
            'curso' => fake()->randomElement([
                'Engenharia de Software',
                'Ciência da Computação',
                'Sistemas de Informação',
                'Análise e Desenvolvimento de Sistemas'
            ]),
        ];
    }
}