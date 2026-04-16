@extends('layouts.admin')
@section('title', 'Editar Classe')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Editar Classe</h1>
    <p class="text-gray-600">Actualize os dados da classe.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ route('classes.update', $class) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="name" id="name" value="{{ old('name', $class->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="level" class="block text-sm font-medium text-gray-700">Nível</label>
            <input type="number" name="level" id="level" value="{{ old('level', $class->level) }}" required min="10" max="13" class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <div class="flex justify-end space-x-3">
            <a href="{{ route('classes.index') }}" class="px-4 py-2 border rounded-md">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md">Actualizar</button>
        </div>
    </form>
</div>
@endsection