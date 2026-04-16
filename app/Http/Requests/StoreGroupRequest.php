<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'year' => 'required|integer|min:2000|max:2100',
            'max_students' => 'required|integer|min:1|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da turma é obrigatório.',
            'course_id.required' => 'Seleccione um curso.',
            'course_id.exists' => 'Curso inválido.',
            'school_class_id.required' => 'Seleccione uma classe.',
            'school_class_id.exists' => 'Classe inválida.',
            'year.required' => 'O ano lectivo é obrigatório.',
            'max_students.required' => 'O número máximo de alunos é obrigatório.',
        ];
    }
}