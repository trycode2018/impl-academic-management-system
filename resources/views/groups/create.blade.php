@extends('layouts.admin')
@section('title', 'Nova Turma')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Criar Turma</h1>
    <p class="text-gray-600">Associe um curso e uma classe para formar uma turma.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ route('groups.store') }}" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome da Turma</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                   placeholder="Ex: 10ª A - Informática">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="course_id" class="block text-sm font-medium text-gray-700 mb-1">Curso</label>
                <select name="course_id" id="course_id" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Seleccione um curso</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="school_class_id" class="block text-sm font-medium text-gray-700 mb-1">Classe</label>
                <select name="school_class_id" id="school_class_id" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Seleccione uma classe</option>
                    @foreach($schoolClasses as $class)
                        <option value="{{ $class->id }}" {{ old('school_class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }} ({{ $class->level }}º)</option>
                    @endforeach
                </select>
                @error('school_class_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Ano Lectivo</label>
                <input type="number" name="year" id="year" value="{{ old('year', date('Y')) }}" required
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500">
                @error('year')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="max_students" class="block text-sm font-medium text-gray-700 mb-1">Máximo de Alunos</label>
                <input type="number" name="max_students" id="max_students" value="{{ old('max_students', 30) }}" required
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500">
                @error('max_students')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('groups.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">Criar Turma</button>
        </div>
    </form>
</div>
@endsection