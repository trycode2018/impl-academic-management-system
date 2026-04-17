<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $students = $this->studentService->searchStudents($request->search);
        } else {
            $students = $this->studentService->getAllStudents();
        }
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $this->studentService->createStudent($request->validated());
        return redirect()->route('students.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function show($id)
    {
        $student = $this->studentService->getStudentById($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = $this->studentService->getStudentById($id);
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $this->studentService->updateStudent($id, $request->validated());
        return redirect()->route('students.index')->with('success', 'Aluno actualizado com sucesso!');
    }

    public function destroy($id)
    {
        try {
            $this->studentService->deleteStudent($id);
            return redirect()->route('students.index')->with('success', 'Aluno eliminado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('students.index')->with('error', $e->getMessage());
        }
    }
}