<?php 

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function getAllCourses()
    {
        return Course::orderBy('name')->paginate(10);
    }

    public function getCourseById($id)
    {
        return Course::findOrFail($id);
    }

    public function createCourse(array $data)
    {
        return Course::create($data);
    }

    public function updateCourse($id, array $data)
    {
        $course = $this->getCourseById($id);
        $course->update($data);
        return $course;
    }

    public function deleteCourse($id)
    {
        $course = $this->getCourseById($id);
        // Verificar se existem turmas associadas
        if ($course->groups()->count() > 0) {
            throw new \Exception('Não é possível eliminar um curso que possui turmas associadas.');
        }
        return $course->delete();
    }

    public function getAllCoursesForSelect()
    {
        return Course::orderBy('name')->get(['id', 'name']);
    }
}