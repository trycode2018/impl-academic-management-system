<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $group = $this->route('group');
        return [
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'year' => 'required|integer|min:2000|max:2100',
            'max_students' => 'required|integer|min:1|max:200',
        ];
    }
}