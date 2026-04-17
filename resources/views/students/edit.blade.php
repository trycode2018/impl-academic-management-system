@extends('layouts.admin')
@section('title', 'Editar Aluno')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Editar Aluno</h1>
    <p class="text-gray-600">Actualize os dados do aluno.</p>
</div>

<div class="bg-white rounded-xl shadow-sm p-6 max-w-3xl">
    <form method="POST" action="{{ route('students.update', $student) }}" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nome Completo *</label>
                <input type="text" name="name" value="{{ old('name', $student->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
                @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email *</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md">
                @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Telefone</label>
                <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Género</label>
                <select name="gender" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">Seleccione</option>
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Masculino</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Feminino</option>
                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Outro</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="status" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="1" {{ old('status', $student->status) == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('status', $student->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Morada</label>
                <textarea name="address" rows="2" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('address', $student->address) }}</textarea>
            </div>
        </div>
        <div class="flex justify-end space-x-3 pt-4 border-t">
            <a href="{{ route('students.index') }}" class="px-4 py-2 border rounded-md">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">Actualizar Aluno</button>
        </div>
    </form>
</div>
@endsection