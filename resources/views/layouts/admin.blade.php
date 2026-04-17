<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'IMPPL') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar com fundo escuro e scroll interno apenas nos itens -->
        <aside class="w-64 bg-primary-800 text-white shadow-xl flex flex-col h-full">
            <!-- Logo e nome da instituição (fixo no topo) -->
            <div class="flex-shrink-0 p-4 border-b border-primary-700 flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 object-contain">
                <div>
                    <h1 class="text-xl font-bold tracking-tight">IMPpL</h1>
                    <p class="text-xs text-primary-200">Sistema Académico</p>
                </div>
            </div>

            <!-- Navegação (scroll apenas aqui) -->
            <nav class="flex-1 overflow-y-auto p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                @if(Auth::user()->isAdmin())
                <a href="{{ route('users.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('users.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Utilizadores</span>
                </a>

                <!-- Gestão Académica -->
                <div class="pt-4 mt-4 border-t border-primary-700">
                    <p class="text-xs text-primary-300 uppercase tracking-wider px-2 mb-2">Académico</p>
                    <a href="{{ route('courses.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('courses.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        <span>Cursos</span>
                    </a>
                    <a href="{{ route('classes.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('classes.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        <span>Classes</span>
                    </a>
                    <a href="{{ route('groups.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('groups.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <span>Turmas</span>
                    </a>
                </div>

                <!-- Gestão de Pessoas -->
                <div class="pt-4 mt-4 border-t border-primary-700">
                    <p class="text-xs text-primary-300 uppercase tracking-wider px-2 mb-2">Pessoas</p>
                    <a href="{{ route('students.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('students.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Alunos</span>
                    </a>
                    <a href="{{ route('teachers.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('teachers.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span>Professores</span>
                    </a>
                    <a href="{{ route('enrollments.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('enrollments.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <span>Matrículas</span>
                    </a>
                </div>
                @endif

                @if(Auth::user()->isAdmin() || Auth::user()->isSecretaria())
                <a href="{{ route('secretaria.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('secretaria.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Secretaria</span>
                </a>
                <div class="pt-4 mt-4 border-t border-primary-700">
                    <p class="text-xs text-primary-300 uppercase tracking-wider px-2 mb-2">Pessoas</p>
                    <a href="{{ route('students.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('students.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Alunos</span>
                    </a>
                    
                    <a href="{{ route('enrollments.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('enrollments.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <span>Matrículas</span>
                    </a>
                </div>

                <div class="pt-4 mt-4 border-t border-primary-700">
                    <p class="text-xs text-primary-300 uppercase tracking-wider px-2 mb-2">Académico</p>
                                        
                    <a href="{{ route('groups.index') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('groups.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <span>Turmas</span>
                    </a>
                </div>
                @endif

                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-2 rounded-lg transition duration-200 {{ request()->routeIs('profile.*') ? 'bg-primary-700 text-white' : 'text-primary-100 hover:bg-primary-700 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Alterar Senha</span>
                </a>
            </nav>

            <!-- Logout (fixo no fim) -->
            <div class="flex-shrink-0 p-4 border-t border-primary-700">
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