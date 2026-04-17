@extends('layouts.admin')
@section('title', 'Alunos')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Alunos</h1>
        <p class="text-gray-600">Gerir cadastro de alunos.</p>
    </div>
    <a href="{{ route('students.create') }}" class="px-4 py-2 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-md shadow-sm">+ Novo Aluno</a>
</div>

<!-- Barra de pesquisa -->
<div class="mb-4">
    <form method="GET" class="flex gap-2">
        <input type="text" name="search" placeholder="Pesquisar por nome, email ou telefone..." value="{{ request('search') }}" class="flex-1 border rounded-md px-3 py-2">
        <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md">Buscar</button>
        @if(request('search'))
            <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">Limpar</a>
        @endif
    </form>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Aluno</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Contacto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Data Nasc.</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Estado</th>
                <th class="px-6 py-3 text-right">Acções</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($students as $student)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-700 font-bold">
                            {{ strtoupper(substr($student->name, 0, 1)) }}
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">{{ $student->name }}</div>
                            <div class="text-sm text-gray-500">{{ $student->email }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->phone ?? '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('d/m/Y') : '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full {{ $student->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $student->status ? 'Activo' : 'Inactivo' }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('students.show', $student) }}" class="text-blue-600 hover:text-blue-900 mr-2" title="Ver">Ver</a>
                    <a href="{{ route('students.edit', $student) }}" class="text-primary-600 hover:text-primary-900 mr-2">Editar</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Eliminar aluno?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhum aluno encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $students->appends(request()->query())->links() }}</div>
@endsection