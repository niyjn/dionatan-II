<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'curso',
        'curso_id',
    ];

    /**
     * TEMA 9 - ATV 17: Relacionamento BelongsTo com Curso
     */
    public function cursoRelacionado(): BelongsTo
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    /**
     * TEMA 5 - ATV 11: Consulta para alunos de determinado curso
     */
    public function scopeDoCurso(Builder $query, string $curso): Builder
    {
        return $query->where('curso', 'like', "%{$curso}%");
    }

    /**
     * TEMA 5 - ATV 11: Consulta para alunos cujo nome contém determinada palavra
     */
    public function scopeNomeContem(Builder $query, string $palavra): Builder
    {
        return $query->where('nome', 'like', "%{$palavra}%");
    }

    /**
     * TEMA 5 - ATV 11: Consulta para alunos cadastrados recentemente
     */
    public function scopeRecentes(Builder $query, int $dias = 30): Builder
    {
        return $query->where('created_at', '>=', now()->subDays($dias))->latest();
    }

    /**
     * TEMA 5 - ATV 11: Consulta para quantidade total de alunos
     */
    public static function quantidade(): int
    {
        return static::count();
    }
}