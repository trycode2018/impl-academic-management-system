<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $class = $this->route('class'); // Obtém o ID da classe
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('school_classes', 'name')->ignore($class)],
            'level' => ['required', 'integer', 'min:10', 'max:13', Rule::unique('school_classes', 'level')->ignore($class)],
        ];
    }
}