<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AlunoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Aluno $aluno): bool
    {
        return true;
    }

    /**
     * TEMA 12 - ATV 23: Deixe apenas Admin cadastrar Aluno
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * TEMA 12 - ATV 23: Professor pode editar (Admin também tem permissão de edição)
     */
    public function update(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin() || $user->isProfessor();
    }

    /**
     * TEMA 12 - ATV 23: Deixe apenas Admin excluir Aluno
     */
    public function delete(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Aluno $aluno): bool
    {
        return $user->isAdmin();
    }
}