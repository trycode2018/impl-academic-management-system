<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function getAllStudents()
    {
        return Student::orderBy('name')->paginate(15);
    }

    public function getStudentById($id)
    {
        return Student::findOrFail($id);
    }

    public function searchStudents($search)
    {
        return Student::where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->paginate(15);
    }

    public function createStudent(array $data)
    {
        return Student::create($data);
    }

    public function updateStudent($id, array $data)
    {
        $student = $this->getStudentById($id);
        $student->update($data);
        return $student;
    }

    public function deleteStudent($id)
    {
        $student = $this->getStudentById($id);
        if ($student->enrollments()->count() > 0) {
            throw new \Exception('Não é possível eliminar um aluno com matrículas associadas.');
        }
        return $student->delete();
    }
}