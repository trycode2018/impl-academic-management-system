<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        $teacher = $this->route('teacher');
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($teacher)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'status' => 'boolean',
        ];
    }
}