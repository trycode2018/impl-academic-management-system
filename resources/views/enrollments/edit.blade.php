@extends('layouts.admin')
@section('title', 'Editar Matrícula')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Editar Matrícula</h1>
    <p class="text-gray-600">Actualize os dados da matrícula do aluno.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ route('enrollments.update', $enrollment) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Aluno *</label>
            <select name="student_id" required class="mt-1 block w-full border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                <option value="">Seleccione um aluno</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id', $enrollment->student_id) == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} ({{ $student->email }})
                    </option>
                @endforeach
            </select>
            @error('student_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Turma *</label>
            <select name="group_id" required class="mt-1 block w-full border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                <option value="">Seleccione uma turma</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ old('group_id', $enrollment->group_id) == $group->id ? 'selected' : '' }}>
                        {{ $group->name }} ({{ $group->course->name }} - {{ $group->schoolClass->name }})
                    </option>
                @endforeach
            </select>
            @error('group_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Ano Lectivo *</label>
            <input type="number" name="academic_year" value="{{ old('academic_year', $enrollment->academic_year) }}" required
                   class="mt-1 block w-full border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
            @error('academic_year')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="status" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                <option value="active" {{ old('status', $enrollment->status) == 'active' ? 'selected' : '' }}>Activa</option>
                <option value="completed" {{ old('status', $enrollment->status) == 'completed' ? 'selected' : '' }}>Concluída</option>
                <option value="cancelled" {{ old('status', $enrollment->status) == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
            </select>
            @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Data de Matrícula</label>
            <input type="date" name="enrollment_date" value="{{ old('enrollment_date', $enrollment->enrollment_date ? $enrollment->enrollment_date->format('Y-m-d') : date('Y-m-d')) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
            @error('enrollment_date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t">
            <a href="{{ route('enrollments.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                Actualizar Matrícula
            </button>
        </div>
    </form>
</div>
@endsection