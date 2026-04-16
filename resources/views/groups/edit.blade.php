@extends('layouts.admin')
@section('title', 'Editar Turma')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Editar Turma</h1>
    <p class="text-gray-600">Modifique os dados da turma.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ route('groups.update', $group) }}">
        @csrf @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome da Turma</label>
            <input type="text" name="name" id="name" value="{{ old('name', $group->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="course_id" class="block text-sm font-medium text-gray-700">Curso</label>
                <select name="course_id" id="course_id" required class="mt-1 block w-full border-gray-300 rounded-md">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $group->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="school_class_id" class="block text-sm font-medium text-gray-700">Classe</label>
                <select name="school_class_id" id="school_class_id" required class="mt-1 block w-full border-gray-300 rounded-md">
                    @foreach($schoolClasses as $class)
                        <option value="{{ $class->id }}" {{ $group->school_class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Ano Lectivo</label>
                <input type="number" name="year" id="year" value="{{ old('year', $group->year) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label for="max_students" class="block text-sm font-medium text-gray-700">Máx. Alunos</label>
                <input type="number" name="max_students" id="max_students" value="{{ old('max_students', $group->max_students) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('groups.index') }}" class="px-4 py-2 border border-gray-300 rounded-md">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md">Actualizar Turma</button>
        </div>
    </form>
</div>
@endsection