@extends('layouts.admin')
@section('title', 'Novo Professor')

@section('content')
<div class="mb-6"><h1 class="text-2xl font-semibold">Cadastrar Professor</h1><p class="text-gray-600">Preencha os dados do novo professor.</p></div>
<div class="bg-white rounded-xl shadow-sm p-6 max-w-3xl">
    <form method="POST" action="{{ route('teachers.store') }}" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div><label class="block text-sm font-medium">Nome *</label><input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md">@error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
            <div><label class="block text-sm font-medium">Email *</label><input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md">@error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror</div>
            <div><label class="block text-sm font-medium">Telefone</label><input type="text" name="phone" value="{{ old('phone') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label class="block text-sm font-medium">Data Nascimento</label><input type="date" name="birth_date" value="{{ old('birth_date') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label class="block text-sm font-medium">Género</label><select name="gender" class="mt-1 block w-full border-gray-300 rounded-md"><option value="">Seleccione</option><option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Masculino</option><option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Feminino</option><option value="other">Outro</option></select></div>
            <div><label class="block text-sm font-medium">Qualificação</label><input type="text" name="qualification" value="{{ old('qualification') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label class="block text-sm font-medium">Especialização</label><input type="text" name="specialization" value="{{ old('specialization') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
            <div><label class="block text-sm font-medium">Estado</label><select name="status" class="mt-1 block w-full border-gray-300 rounded-md"><option value="1" {{ old('status',1)==1 ? 'selected' : '' }}>Activo</option><option value="0">Inactivo</option></select></div>
            <div class="md:col-span-2"><label class="block text-sm font-medium">Morada</label><textarea name="address" rows="2" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('address') }}</textarea></div>
        </div>
        <div class="flex justify-end space-x-3"><a href="{{ route('teachers.index') }}" class="px-4 py-2 border rounded-md">Cancelar</a><button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md">Salvar Professor</button></div>
    </form>
</div>
@endsection