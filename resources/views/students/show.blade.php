@extends('layouts.admin')
@section('title', 'Detalhes do Aluno')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Perfil do Aluno</h1>
    <p class="text-gray-600">Visualização detalhada e histórico de matrículas.</p>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-200 bg-gray-50">
        <div class="flex items-center">
            <div class="h-20 w-20 rounded-full bg-primary-100 flex items-center justify-center text-primary-700 text-2xl font-bold">
                {{ strtoupper(substr($student->name, 0, 1)) }}
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $student->name }}</h2>
                <p class="text-gray-600">{{ $student->email }}</p>
                <span class="inline-flex mt-1 px-2 py-1 text-xs rounded-full {{ $student->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $student->status ? 'Activo' : 'Inactivo' }}
                </span>
            </div>
        </div>
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Informações Pessoais</h3>
            <dl class="space-y-2">
                <div class="flex"><dt class="w-32 text-gray-600">Telefone:</dt><dd class="text-gray-800">{{ $student->phone ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Data Nasc.:</dt><dd class="text-gray-800">{{ $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('d/m/Y') : '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Género:</dt><dd class="text-gray-800">{{ ucfirst($student->gender) ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Morada:</dt><dd class="text-gray-800">{{ $student->address ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Registado em:</dt><dd class="text-gray-800">{{ $student->created_at->format('d/m/Y H:i') }}</dd></div>
            </dl>
        </div>
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-3">Matrículas</h3>
            @if($student->enrollments->count())
                <ul class="space-y-2">
                    @foreach($student->enrollments as $enrollment)
                    <li class="border-b pb-2">
                        <div class="font-medium">{{ $enrollment->group->name }}</div>
                        <div class="text-sm text-gray-600">{{ $enrollment->group->course->name }} - {{ $enrollment->group->schoolClass->name }}</div>
                        <div class="text-xs text-gray-500">Ano: {{ $enrollment->academic_year }} | Status: {{ ucfirst($enrollment->status) }}</div>
                    </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Nenhuma matrícula registada.</p>
            @endif
        </div>
    </div>
    <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
        <a href="{{ route('students.edit', $student) }}" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">Editar</a>
        <a href="{{ route('students.index') }}" class="px-4 py-2 border rounded-md">Voltar</a>
    </div>
</div>
@endsection