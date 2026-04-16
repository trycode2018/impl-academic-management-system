<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Services\GroupService;
use App\Services\CourseService;
use App\Services\ClassService;

class GroupController extends Controller
{
    protected $groupService;
    protected $courseService;
    protected $classService;

    public function __construct(GroupService $groupService, CourseService $courseService, ClassService $classService)
    {
        $this->groupService = $groupService;
        $this->courseService = $courseService;
        $this->classService = $classService;
    }

    public function index()
    {
        $groups = $this->groupService->getAllGroups();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $courses = $this->courseService->getAllCoursesForSelect();
        $schoolClasses = $this->classService->getAllClassesForSelect();
        return view('groups.create', compact('courses', 'schoolClasses'));
    }

    public function store(StoreGroupRequest $request)
    {
        try {
            $this->groupService->createGroup($request->validated());
            return redirect()->route('groups.index')->with('success', 'Turma criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $group = $this->groupService->getGroupById($id);
        $courses = $this->courseService->getAllCoursesForSelect();
        $schoolClasses = $this->classService->getAllClassesForSelect();
        return view('groups.edit', compact('group', 'courses', 'schoolClasses'));
    }

    public function update(UpdateGroupRequest $request, $id)
    {
        try {
            $this->groupService->updateGroup($id, $request->validated());
            return redirect()->route('groups.index')->with('success', 'Turma actualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->groupService->deleteGroup($id);
            return redirect()->route('groups.index')->with('success', 'Turma eliminada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('groups.index')->with('error', $e->getMessage());
        }
    }
}