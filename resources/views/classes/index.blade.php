@extends('layouts.admin')
@section('title', 'Classes')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Classes / Anos</h1>
        <p class="text-gray-600">Gerir as classes académicas (10ª, 11ª, 12ª, 13ª).</p>
    </div>
    <a href="{{ route('classes.create') }}" class="px-4 py-2 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-md hover:from-primary-700 hover:to-primary-800 transition shadow-sm">
        + Nova Classe
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 rounded bg-green-100 text-green-700 border border-green-200">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nível</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Criado em</th>
                    <th class="relative px-6 py-3">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($classes as $class)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $class->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $class->level }}º Ano</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $class->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('classes.edit', $class) }}" class="text-primary-600 hover:text-primary-900">Editar</a>
                            <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar esta classe?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhuma classe registada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection