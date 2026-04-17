<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnrollmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules():array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'group_id' => 'required|exists:groups,id',
            'enrollment_date' => 'nullable|date',
            'status' => 'required|in:active,completed,cancelled',
            'academic_year' => 'required|integer|min:2000|max:2100',
        ];
    }
}
