@extends('layouts.admin')
@section('title', 'Matrículas')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div><h1 class="text-2xl font-semibold">Matrículas</h1><p class="text-gray-600">Gerir matrículas de alunos</p></div>
    <a href="{{ route('enrollments.create') }}" class="px-4 py-2 bg-primary-600 text-white rounded-md">+ Nova Matrícula</a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Aluno</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Turma</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Curso / Classe</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Ano Lectivo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Estado</th>
                <th class="px-6 py-3 text-right">Acções</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($enrollments as $enrollment)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $enrollment->student->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $enrollment->group->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $enrollment->group->course->name }} / {{ $enrollment->group->schoolClass->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $enrollment->academic_year }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full 
                        @if($enrollment->status=='active') bg-green-100 text-green-800
                        @elseif($enrollment->status=='completed') bg-blue-100 text-blue-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($enrollment->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right">
                    <a href="{{ route('enrollments.edit', $enrollment) }}" class="text-primary-600 mr-2">Editar</a>
                    <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Cancelar/remover matrícula?')">Remover</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">Nenhuma matrícula registada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $enrollments->links() }}</div>
@endsection