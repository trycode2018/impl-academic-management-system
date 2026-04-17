<?php

namespace App\Services;

use App\Models\Teacher;

class TeacherService
{
    public function getAllTeachers()
    {
        return Teacher::orderBy('name')->paginate(15);
    }

    public function searchTeachers($search)
    {
        return Teacher::where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->paginate(15);
    }

    public function getTeacherById($id)
    {
        return Teacher::findOrFail($id);
    }

    public function createTeacher(array $data)
    {
        return Teacher::create($data);
    }

    public function updateTeacher($id, array $data)
    {
        $teacher = $this->getTeacherById($id);
        $teacher->update($data);
        return $teacher;
    }

    public function deleteTeacher($id)
    {
        $teacher = $this->getTeacherById($id);
        // Verificar se professor está associado a alguma disciplina? (futuro)
        return $teacher->delete();
    }
}