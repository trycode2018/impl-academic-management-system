@extends('layouts.guest')
@section('title', 'Login')

@section('content')
<div class="text-center">
    <div class="flex justify-center mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto">
    </div>
    <h2 class="text-3xl font-extrabold text-gray-900">Bem-vindo</h2>
    <p class="mt-2 text-sm text-gray-600">Aceda ao sistema académico IMPL</p>
</div>
<form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="rounded-md shadow-sm -space-y-px">
        <div>
            <label for="email" class="sr-only">Email</label>
            <input id="email" name="email" type="email" autocomplete="email" required autofocus
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                   placeholder="Endereço de email" value="{{ old('email') }}">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="sr-only">Senha</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                   placeholder="Senha">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
            <label for="remember_me" class="ml-2 block text-sm text-gray-900"> Lembrar-me </label>
        </div>
        @if (Route::has('password.request'))
            <div class="text-sm">
                <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500"> Esqueceu a senha? </a>
            </div>
        @endif
    </div>

    <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            Entrar
        </button>
    </div>
</form>
@endsection