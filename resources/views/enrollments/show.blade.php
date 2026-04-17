@extends('layouts.admin')
@section('title', 'Detalhes da Matrícula')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Detalhes da Matrícula</h1>
    <p class="text-gray-600">Visualização completa da matrícula.</p>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-200 bg-gray-50">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Matrícula #{{ $enrollment->id }}</h2>
                <p class="text-gray-600">Registada em {{ $enrollment->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <span class="inline-flex px-3 py-1 text-sm rounded-full 
                @if($enrollment->status == 'active') bg-green-100 text-green-800
                @elseif($enrollment->status == 'completed') bg-blue-100 text-blue-800
                @else bg-red-100 text-red-800 @endif">
                {{ ucfirst($enrollment->status) }}
            </span>
        </div>
    </div>

    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Dados do Aluno
            </h3>
            <dl class="space-y-2">
                <div class="flex"><dt class="w-32 text-gray-600">Nome:</dt><dd class="text-gray-800 font-medium">{{ $enrollment->student->name }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Email:</dt><dd class="text-gray-800">{{ $enrollment->student->email }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Telefone:</dt><dd class="text-gray-800">{{ $enrollment->student->phone ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Status:</dt><dd class="text-gray-800">{{ $enrollment->student->status ? 'Activo' : 'Inactivo' }}</dd></div>
            </dl>
        </div>

        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Dados da Turma
            </h3>
            <dl class="space-y-2">
                <div class="flex"><dt class="w-32 text-gray-600">Turma:</dt><dd class="text-gray-800 font-medium">{{ $enrollment->group->name }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Curso:</dt><dd class="text-gray-800">{{ $enrollment->group->course->name }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Classe:</dt><dd class="text-gray-800">{{ $enrollment->group->schoolClass->name }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Ano Lectivo:</dt><dd class="text-gray-800">{{ $enrollment->academic_year }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Data Matrícula:</dt><dd class="text-gray-800">{{ \Carbon\Carbon::parse($enrollment->enrollment_date)->format('d/m/Y') }}</dd></div>
            </dl>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
        <a href="{{ route('enrollments.edit', $enrollment) }}" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition">Editar Matrícula</a>
        <a href="{{ route('enrollments.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">Voltar</a>
    </div>
</div>
@endsection