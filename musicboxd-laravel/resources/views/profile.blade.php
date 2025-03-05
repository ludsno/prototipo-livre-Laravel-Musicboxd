@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
    <section class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-5 text-[var(--text-color)]">Perfil de {{ $user->name }}</h1>
        <h2 class="text-2xl mb-4 text-[var(--text-color)]">Suas Avaliações</h2>
        @forelse ($reviews as $review)
            <div class="bg-[var(--light-bg-color)] p-4 mb-4 rounded-[var(--border-radius)] shadow-[var(--box-shadow)] flex gap-4">
                <img src="https://placehold.co/60" alt="Capa do álbum" class="w-16 h-16 rounded-[var(--border-radius)]">
                <div class="flex-1">
                    <p class="text-lg text-[var(--text-color)]">
                        "{{ $review->song->title }}" - {{ $review->song->artist }}: 
                        <span class="rating-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($review->rating >= $i)
                                    <span class="star">★</span>
                                @else
                                    <span class="star">☆</span>
                                @endif
                            @endfor
                        </span>
                        {{ $review->rating }}
                    </p>
                    <p class="text-[#7f8c8d] italic mt-1">"{{ $review->review ?? 'Sem comentário' }}"</p>
                    <span class="text-sm text-[#bdc3c7] block mt-1">{{ $review->date->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Você ainda não fez nenhuma avaliação.</p>
        @endforelse
        <a href="{{ route('profile.edit', $user->id) }}" class="inline-block mb-5 px-4 py-2 bg-[var(--primary-color)] text-white rounded-[var(--border-radius)] hover:bg-[#e55b40] transition-colors">Editar Perfil</a>
        <a href="{{ route('home') }}" class="text-[var(--primary-color)] hover:text-[#e55b40] transition-colors">Voltar para a Home</a>
    </section>
@endsection
