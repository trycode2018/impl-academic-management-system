@extends('layouts.admin')
@section('title', 'Editar Professor')

@section('content')
<div class="mb-6"><h1 class="text-2xl font-semibold">Editar Professor</h1><p class="text-gray-600">Actualize os dados do professor.</p></div>
<div class="bg-white rounded-xl shadow-sm p-6 max-w-3xl">
    <form method="POST" action="{{ route('teachers.update', $teacher) }}" class="space-y-6">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div><label>Nome *</label><input type="text" name="name" value="{{ old('name', $teacher->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label>Email *</label><input type="email" name="email" value="{{ old('email', $teacher->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label>Telefone</label><input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label>Data Nascimento</label><input type="date" name="birth_date" value="{{ old('birth_date', $teacher->birth_date) }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label>Género</label><select name="gender" class="mt-1 block w-full border-gray-300 rounded-md"><option value="">Seleccione</option><option value="male" {{ old('gender', $teacher->gender)=='male' ? 'selected' : '' }}>Masculino</option><option value="female" {{ old('gender', $teacher->gender)=='female' ? 'selected' : '' }}>Feminino</option><option value="other">Outro</option></select></div>
            <div><label>Qualificação</label><input type="text" name="qualification" value="{{ old('qualification', $teacher->qualification) }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label>Especialização</label><input type="text" name="specialization" value="{{ old('specialization', $teacher->specialization) }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label>Estado</label><select name="status" class="mt-1 block w-full border-gray-300 rounded-md"><option value="1" {{ old('status', $teacher->status)==1 ? 'selected' : '' }}>Activo</option><option value="0">Inactivo</option></select></div>
            <div class="md:col-span-2"><label>Morada</label><textarea name="address" rows="2" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('address', $teacher->address) }}</textarea></div>
        </div>
        <div class="flex justify-end space-x-3"><a href="{{ route('teachers.index') }}" class="px-4 py-2 border rounded-md">Cancelar</a><button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md">Actualizar Professor</button></div>
    </form>
</div>
@endsection