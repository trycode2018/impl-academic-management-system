<?php

namespace App\Services;

use App\Models\Enrollment;

class EnrollmentService
{
    public function getAllEnrollments()
    {
        return Enrollment::with(['student', 'group.course', 'group.schoolClass'])
                         ->orderBy('academic_year', 'desc')
                         ->orderBy('created_at', 'desc')
                         ->paginate(15);
    }

    public function getEnrollmentById($id)
    {
        return Enrollment::with(['student', 'group'])->findOrFail($id);
    }

    public function createEnrollment(array $data)
    {
        // Verificar se aluno já está matriculado na mesma turma
        $exists = Enrollment::where('student_id', $data['student_id'])
                            ->where('group_id', $data['group_id'])
                            ->exists();
        if ($exists) {
            throw new \Exception('Este aluno já está matriculado nesta turma.');
        }
        return Enrollment::create($data);
    }

    public function updateEnrollment($id, array $data)
    {
        $enrollment = $this->getEnrollmentById($id);
        $enrollment->update($data);
        return $enrollment;
    }

    public function deleteEnrollment($id)
    {
        $enrollment = $this->getEnrollmentById($id);
        return $enrollment->delete();
    }
}