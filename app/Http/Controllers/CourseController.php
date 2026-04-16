<?php 

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $courses = $this->courseService->getAllCourses();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $this->courseService->createCourse($request->validated());
        return redirect()->route('courses.index')->with('success', 'Curso criado com sucesso!');
    }

    public function edit($id)
    {
        $course = $this->courseService->getCourseById($id);
        return view('courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $this->courseService->updateCourse($id, $request->validated());
        return redirect()->route('courses.index')->with('success', 'Curso actualizado com sucesso!');
    }

    public function destroy($id)
    {
        try {
            $this->courseService->deleteCourse($id);
            return redirect()->route('courses.index')->with('success', 'Curso eliminado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('courses.index')->with('error', $e->getMessage());
        }
    }
}