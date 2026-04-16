<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:school_classes,name',
            'level' => 'required|integer|min:10|max:13|unique:school_classes,level',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da classe é obrigatório.',
            'name.unique' => 'Já existe uma classe com este nome.',
            'level.required' => 'O nível é obrigatório.',
            'level.unique' => 'Já existe uma classe com este nível.',
            'level.min' => 'O nível mínimo é 10.',
            'level.max' => 'O nível máximo é 13.',
        ];
    }
}