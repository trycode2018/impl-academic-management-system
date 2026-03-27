@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Bem-vindo de volta, {{ Auth::user()->name }}!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Card Total Utilizadores -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden border-t-4 border-primary-500">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Total Utilizadores</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="p-3 rounded-full bg-primary-100 text-primary-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    12% 
                </span>
                <span class="text-gray-500 ml-2">desde o mês passado</span>
            </div>
        </div>
    </div>

    <!-- Card Administradores -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden border-t-4 border-accent-500">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Administradores</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\User::where('role', 'admin')->count() }}</p>
                </div>
                <div class="p-3 rounded-full bg-accent-100 text-accent-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    5% 
                </span>
                <span class="text-gray-500 ml-2">crescimento</span>
            </div>
        </div>
    </div>

    <!-- Card Secretaria -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden border-t-4 border-blue-500">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Secretaria</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\User::where('role', 'secretaria')->count() }}</p>
                </div>
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"/></svg>
                    2% 
                </span>
                <span class="text-gray-500 ml-2">redução</span>
            </div>
        </div>
    </div>
</div>

<!-- Profile Card - Moderno com duas colunas -->
<div class="bg-gradient-to-r from-primary-700 to-primary-800 rounded-xl shadow-lg overflow-hidden">
    <div class="flex flex-col md:flex-row">
        <!-- Lado esquerdo: ilustração e texto -->
        <div class="md:w-1/3 p-6 flex flex-col items-center justify-center text-center border-r border-primary-600">
            <div class="bg-white/10 rounded-full p-4 mb-3">
                <svg class="h-16 w-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
            </div>
            <p class="text-white/80 text-sm">Olá,</p>
            <p class="text-white font-bold text-xl mt-1">{{ Auth::user()->name }}</p>
            <p class="text-white/60 text-xs mt-2">Mantenha o sistema sempre actualizado</p>
        </div>

        <!-- Lado direito: informações do perfil -->
        <div class="md:w-2/3 p-6">
            <h3 class="text-white font-semibold text-lg mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                Informações do Perfil
            </h3>
            <div class="grid grid-cols-1 gap-3 text-white/90">
                <div class="flex justify-between items-center border-b border-primary-600 pb-2">
                    <span class="text-sm font-medium">Nome completo:</span>
                    <span class="text-sm">{{ Auth::user()->name }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-primary-600 pb-2">
                    <span class="text-sm font-medium">Endereço de email:</span>
                    <span class="text-sm">{{ Auth::user()->email }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-primary-600 pb-2">
                    <span class="text-sm font-medium">Perfil de acesso:</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-white/20 text-white">
                        @if(Auth::user()->isAdmin())
                            Administrador
                        @else
                            Secretaria
                        @endif
                    </span>
                </div>
                <div class="flex justify-between items-center border-b border-primary-600 pb-2">
                    <span class="text-sm font-medium">Membro desde:</span>
                    <span class="text-sm">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
            <div class="mt-4 text-right">
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-sm text-white/80 hover:text-white transition">
                    Alterar senha
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection