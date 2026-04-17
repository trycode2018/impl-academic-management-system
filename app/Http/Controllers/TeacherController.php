<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $teachers = $this->teacherService->searchTeachers($request->search);
        } else {
            $teachers = $this->teacherService->getAllTeachers();
        }
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $this->teacherService->createTeacher($request->validated());
        return redirect()->route('teachers.index')->with('success', 'Professor criado com sucesso!');
    }

    public function show($id)
    {
        $teacher = $this->teacherService->getTeacherById($id);
        return view('teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = $this->teacherService->getTeacherById($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, $id)
    {
        $this->teacherService->updateTeacher($id, $request->validated());
        return redirect()->route('teachers.index')->with('success', 'Professor actualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->teacherService->deleteTeacher($id);
        return redirect()->route('teachers.index')->with('success', 'Professor eliminado com sucesso!');
    }
}