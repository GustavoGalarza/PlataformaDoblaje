<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir que todos los usuarios autorizados puedan usar este request
    }

    public function rules()
{
    $rules = [
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($this->user), // 👈 ignorar usuario actual
        ],
        'rol_id' => 'required|exists:roles,id',
    ];

    if ($this->isMethod('post')) { // Crear
        $rules['password'] = 'required|string|min:8|confirmed';
    }

    if ($this->isMethod('put') || $this->isMethod('patch')) { // Editar
        $rules['password'] = 'nullable|string|min:8|confirmed';
    }

    return $rules;
}

}
//asta aki funciona create y edit