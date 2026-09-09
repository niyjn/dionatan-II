<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * TEMA 8 - ATV 15: Validações para Aluno
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $alunoId = $this->route('aluno') ? ($this->route('aluno')->id ?? $this->route('aluno')) : null;

        return [
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('alunos', 'email')->ignore($alunoId)],
            'matricula' => ['required', 'string', 'max:50', Rule::unique('alunos', 'matricula')->ignore($alunoId)],
            'curso' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * TEMA 8 - DESAFIO: Mensagens personalizadas para as validações
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome do aluno é obrigatório.',
            'nome.min' => 'O nome do aluno deve conter no mínimo :min caracteres.',
            'nome.max' => 'O nome do aluno não pode ultrapassar :max caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Por favor, informe um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está sendo utilizado por outro aluno.',
            'matricula.required' => 'O número de matrícula é obrigatório.',
            'matricula.unique' => 'Esta matrícula já está cadastrada para outro aluno.',
            'curso.required' => 'Por favor, selecione ou informe o curso do aluno.',
        ];
    }
}