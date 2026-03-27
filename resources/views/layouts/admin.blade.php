<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'IMPL') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar com fundo escuro -->
        <aside class="w-64 bg-primary-800 text-white shadow-xl flex flex-col">
            <!-- Logo e nome da instituição -->
            <div class="p-4 border-b border-primary-700 flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 object-contain">
                <div>
                    <h1 class="text-xl font-bold tracking-tight">IMPL</h1>
                    <p class="text-xs text-primary-200">Sistema Académico</p>
                </div>
            </div>

            <!-- Navegação -->
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                @if(Auth::user()->isAdmin())
                <a href="{{ route('users.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('users.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Utilizadores</span>
                </a>
                @endif

                @if(Auth::user()->isAdmin() || Auth::user()->isSecretaria())
                <a href="{{ route('secretaria.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('secretaria.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Secretaria</span>
                </a>
                @endif

                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('profile.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Alterar Senha</span>
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-primary-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 p-2 w-full text-left text-primary-100 hover:bg-primary-700 hover:text-white rounded-lg transition duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Sair</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="py-6 px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>