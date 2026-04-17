@extends('layouts.admin')
@section('title', 'Nova Matrícula')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold">Realizar Matrícula</h1>
    <p class="text-gray-600">Associe um aluno a uma turma.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ route('enrollments.store') }}" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Aluno *</label>
            <select name="student_id" required class="mt-1 block w-full border-gray-300 rounded-md">
                <option value="">Seleccione um aluno</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->email }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Turma *</label>
            <select name="group_id" required class="mt-1 block w-full border-gray-300 rounded-md">
                <option value="">Seleccione uma turma</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }} ({{ $group->course->name }} - {{ $group->schoolClass->name }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Ano Lectivo *</label>
            <input type="number" name="academic_year" value="{{ old('academic_year', date('Y')) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="status" class="mt-1 block w-full border-gray-300 rounded-md">
                <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Activa</option>
                <option value="completed">Concluída</option>
                <option value="cancelled">Cancelada</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Data de Matrícula</label>
            <input type="date" name="enrollment_date" value="{{ old('enrollment_date', date('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <div class="flex justify-end space-x-3">
            <a href="{{ route('enrollments.index') }}" class="px-4 py-2 border rounded-md">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md">Registrar Matrícula</button>
        </div>
    </form>
</div>
@endsection