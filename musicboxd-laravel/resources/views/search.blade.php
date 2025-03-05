@extends('layouts.app')

@section('title', 'Pesquisa')

@section('content')
    <section class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-5 text-[var(--text-color)]">Resultados para "{{ $query }}"</h1>
        @forelse ($songs as $song)
            <div class="bg-[var(--light-bg-color)] p-4 mb-4 rounded-[var(--border-radius)] shadow-[var(--box-shadow)]">
                <p class="text-lg text-[var(--text-color)]">
                    "{{ $song->title }}" - {{ $song->artist }}
                    @if ($song->reviews->count() > 0)
                        (Média: {{ number_format($song->reviews->avg('rating'), 2) }} ★)
                    @endif
                </p>
            </div>
        @empty
            <p class="text-gray-500">Nenhum resultado encontrado para "{{ $query }}".</p>
        @endforelse
        <a href="{{ route('home') }}" class="text-[var(--primary-color)] hover:text-[#e55b40] transition-colors">Voltar para a Home</a>
    </section>
@endsection