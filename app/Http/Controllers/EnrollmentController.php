<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Services\EnrollmentService;
use App\Services\StudentService;
use App\Services\GroupService;

class EnrollmentController extends Controller
{
    protected $enrollmentService, $studentService, $groupService;

    public function __construct(EnrollmentService $enrollmentService, StudentService $studentService, GroupService $groupService)
    {
        $this->enrollmentService = $enrollmentService;
        $this->studentService = $studentService;
        $this->groupService = $groupService;
    }

    public function index()
    {
        $enrollments = $this->enrollmentService->getAllEnrollments();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = $this->studentService->getAllStudents(); // sem paginação
        $groups = $this->groupService->getAllGroups(); // usar um método que retorne todos para select
        return view('enrollments.create', compact('students', 'groups'));
    }

    public function store(StoreEnrollmentRequest $request)
    {
        try {
            $this->enrollmentService->createEnrollment($request->validated());
            return redirect()->route('enrollments.index')->with('success', 'Matrícula realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $enrollment = $this->enrollmentService->getEnrollmentById($id);
        $students = $this->studentService->getAllStudents();
        $groups = $this->groupService->getAllGroups();
        return view('enrollments.edit', compact('enrollment', 'students', 'groups'));
    }

    public function show($id)
    {
        $enrollment = $this->enrollmentService->getEnrollmentById($id);
        return view('enrollments.show', compact('enrollment'));
    }
    
    public function update(UpdateEnrollmentRequest $request, $id)
    {
        $this->enrollmentService->updateEnrollment($id, $request->validated());
        return redirect()->route('enrollments.index')->with('success', 'Matrícula actualizada com sucesso!');
    }

    public function destroy($id)
    {
        $this->enrollmentService->deleteEnrollment($id);
        return redirect()->route('enrollments.index')->with('success', 'Matrícula cancelada/removida com sucesso!');
    }
}