<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Services\ClassService;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    protected $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    public function index()
    {
        $classes = $this->classService->getAllClasses();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(StoreClassRequest $request)
    {
        try {
            $this->classService->createClass($request->validated());
            return redirect()->route('classes.index')->with('success', 'Classe criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $class = $this->classService->getClassById($id);
        return view('classes.edit', compact('class'));
    }

    public function update(UpdateClassRequest $request, $id)
    {
        try {
            $this->classService->updateClass($id, $request->validated());
            return redirect()->route('classes.index')->with('success', 'Classe actualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->classService->deleteClass($id);
            return redirect()->route('classes.index')->with('success', 'Classe eliminada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('classes.index')->with('error', $e->getMessage());
        }
    }
}