@extends('layouts.admin')
@section('title', 'Turmas')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Turmas</h1>
        <p class="text-gray-600">Gerir turmas associadas a cursos e classes.</p>
    </div>
    <a href="{{ route('groups.create') }}" class="px-4 py-2 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-md hover:from-primary-700 hover:to-primary-800 transition shadow-sm">
        + Nova Turma
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 rounded bg-green-100 text-green-700">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Turma</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Curso</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Classe</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ano Lectivo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Máx. Alunos</th>
                <th class="relative px-6 py-3">Acções</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($groups as $group)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $group->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $group->course->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $group->schoolClass->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $group->year }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $group->max_students }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('groups.edit', $group) }}" class="text-primary-600 hover:text-primary-900 mr-3">Editar</a>
                    <form action="{{ route('groups.destroy', $group) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Eliminar turma?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">Nenhuma turma criada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $groups->links() }}</div>
@endsection