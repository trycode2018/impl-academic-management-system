<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determina se o utilizador está autorizado a fazer este pedido
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'required',
                'current_password',
            ],
            'new_password' => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
        ];
    }

    /**
     * Mensagens personalizadas de erro
     */
    public function messages(): array
    {
        return [
            'current_password.current_password' => 'A senha actual está incorrecta.',
        ];
    }
}