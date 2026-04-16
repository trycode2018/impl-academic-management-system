@extends('layouts.admin')
@section('title', 'Novo Curso')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Criar Novo Curso</h1>
    <p class="text-gray-600">Adicione um novo curso ao catálogo académico.</p>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6">
        <form method="POST" action="{{ route('courses.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome do Curso</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-primary-500 focus:border-primary-500 @error('name') border-red-300 @enderror"
                           placeholder="Ex: Informática, Enfermagem, etc.">
                </div>
                @error('name')
                    <p class="mt-1 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                <div class="relative">
                    <div class="absolute top-3 left-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </div>
                    <textarea name="description" id="description" rows="3"
                              class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                              placeholder="Descrição detalhada do curso...">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duração</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <input type="text" name="duration" id="duration" value="{{ old('duration') }}"
                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                           placeholder="Ex: 3 anos, 4 semestres, etc.">
                </div>
                @error('duration')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }} class="text-primary-600 focus:ring-primary-500">
                        <span class="ml-2 text-sm text-gray-700">Activo</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }} class="text-gray-600 focus:ring-primary-500">
                        <span class="ml-2 text-sm text-gray-700">Inactivo</span>
                    </label>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4 flex justify-end space-x-3">
                <a href="{{ route('courses.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition shadow-sm">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-primary-600 to-primary-700 text-white rounded-md hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition shadow-sm">
                    Criar Curso
                </button>
            </div>
        </form>
    </div>
</div>
@endsection