{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <section class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-5 text-[var(--text-color)]">Editar Perfil</h1>
        @if (session('success'))
            <p class="text-green-500 mb-4">{{ session('success') }}</p>
        @endif
        <form method="POST" action="{{ route('profile.update') }}" class="bg-[var(--light-bg-color)] p-4 rounded-[var(--border-radius)] shadow-[var(--box-shadow)]">
            @csrf
            @method('PATCH')
            <label class="block mb-2 text-[var(--text-color)]">Nome:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]" required>
            <label class="block mb-2 text-[var(--text-color)]">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]" required>
            <button type="submit" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-[var(--border-radius)] hover:bg-[#e55b40] transition-all">Salvar</button>
        </form>
        <a href="{{ route('profile.show') }}" class="text-[var(--primary-color)] hover:text-[#e55b40] transition-colors mt-4 block">Voltar ao Perfil</a>
    </section>
@endsection