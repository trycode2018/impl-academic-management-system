@extends('layouts.admin')
@section('title', 'Detalhes do Professor')

@section('content')
<div class="mb-6"><h1 class="text-2xl font-semibold">Perfil do Professor</h1><p class="text-gray-600">Visualização detalhada.</p></div>
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b bg-gray-50">
        <div class="flex items-center">
            <div class="h-20 w-20 rounded-full bg-primary-100 flex items-center justify-center text-primary-700 text-2xl font-bold">
                {{ strtoupper(substr($teacher->name,0,1)) }}
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-bold">{{ $teacher->name }}</h2>
                <p class="text-gray-600">{{ $teacher->email }}</p>
                <span class="inline-flex mt-1 px-2 py-1 text-xs rounded-full {{ $teacher->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $teacher->status ? 'Activo' : 'Inactivo' }}
                </span>
            </div>
        </div>
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-medium mb-3">Informações Pessoais</h3>
            <dl class="space-y-2">
                <div class="flex"><dt class="w-32 text-gray-600">Telefone:</dt><dd>{{ $teacher->phone ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Data Nasc.:</dt><dd>{{ $teacher->birth_date ? \Carbon\Carbon::parse($teacher->birth_date)->format('d/m/Y') : '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Género:</dt><dd>{{ ucfirst($teacher->gender) ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Morada:</dt><dd>{{ $teacher->address ?? '-' }}</dd></div>
            </dl>
        </div>
        <div>
            <h3 class="text-lg font-medium mb-3">Formação Académica</h3>
            <dl class="space-y-2">
                <div class="flex"><dt class="w-32 text-gray-600">Qualificação:</dt><dd>{{ $teacher->qualification ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Especialização:</dt><dd>{{ $teacher->specialization ?? '-' }}</dd></div>
                <div class="flex"><dt class="w-32 text-gray-600">Registado em:</dt><dd>{{ $teacher->created_at->format('d/m/Y H:i') }}</dd></div>
            </dl>
        </div>
    </div>
    <div class="p-6 border-t flex justify-end space-x-3">
        <a href="{{ route('teachers.edit', $teacher) }}" class="px-4 py-2 bg-primary-600 text-white rounded-md">Editar</a>
        <a href="{{ route('teachers.index') }}" class="px-4 py-2 border rounded-md">Voltar</a>
    </div>
</div>
@endsection