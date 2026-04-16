@extends('layouts.admin')
@section('title', 'Nova Classe')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Adicionar Classe</h1>
    <p class="text-gray-600">Registe uma nova classe (ex: 10ª, 11ª, 12ª, 13ª).</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
    <form method="POST" action="{{ route('classes.store') }}" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome da Classe</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-primary-500 focus:border-primary-500">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Nível (10, 11, 12, 13)</label>
            <input type="number" name="level" id="level" value="{{ old('level') }}" required min="10" max="13"
                   class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-primary-500 focus:border-primary-500">
            @error('level')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('classes.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">Criar Classe</button>
        </div>
    </form>
</div>
@endsection