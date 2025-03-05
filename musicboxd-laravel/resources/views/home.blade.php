@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="feed">
        <h1 class="text-3xl font-bold mb-5 text-[var(--text-color)]">Atividades recentes</h1>
        @forelse ($reviews as $review)
            <div class="post bg-[var(--light-bg-color)] p-4 mb-4 rounded-[var(--border-radius)] shadow-[var(--box-shadow)] hover:shadow-[var(--hover-shadow)] hover:bg-[#f5f6f5] flex gap-4 transition-all">
                <img src="https://placehold.co/60" alt="Capa do álbum" class="w-16 h-16 rounded-[var(--border-radius)]">
                <div class="post-content flex-1">
                    <p class="text-lg text-[var(--text-color)]">
                        <strong>{{ $review->user->name }}</strong> deu 
                        <span class="rating-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($review->rating >= $i)
                                    <span class="star">★</span>
                                @elseif ($review->rating >= $i - 0.5)
                                    <span class="star">½</span>
                                @else
                                    <span class="star">☆</span>
                                @endif
                            @endfor
                        </span>
                        para "<span class="font-medium">{{ $review->song->title }}</span>" - {{ $review->song->artist }}
                    </p>
                    <p class="review text-[#7f8c8d] italic mt-1">"{{ $review->review ?? 'Sem comentário' }}"</p>
                    <span class="timestamp text-sm text-[#bdc3c7] block mt-1">{{ $review->date->format('d/m/Y H:i') }}</span>
                    @if ($review->user_id == auth()->id())
                        <div class="mt-2 flex gap-2">
                            <a href="{{ route('reviews.edit', $review) }}" class="edit-btn bg-[var(--primary-color)] text-white px-3 py-2 rounded-[var(--border-radius)] hover:bg-[#e55b40] hover:shadow-[var(--hover-shadow)] transition-all">Editar</a>
                            <form method="POST" action="{{ route('reviews.destroy', $review) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="delete-btn bg-[#e74c3c] text-white px-3 py-2 rounded-[var(--border-radius)] hover:bg-[#c0392b] hover:shadow-[var(--hover-shadow)] transition-all" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500">Nenhuma atividade recente.</p>
        @endforelse
    </section>
@endsection