<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'descricao',
    ];

    /**
     * TEMA 9 - ATV 17: Relacionamento HasMany com Aluno
     */
    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class, 'curso_id');
    }
}