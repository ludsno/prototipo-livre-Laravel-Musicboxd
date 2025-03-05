{{-- @extends('layouts.app')
@section('content')
    <h1 class="text-2xl mb-4">Editar Avaliação</h1>
    <form method="POST" action="{{ route('reviews.update', $review) }}" class="max-w-md mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Música:</label>
            <select name="song_id" class="w-full border p-2 rounded">
                @foreach ($songs as $song)
                    <option value="{{ $song->id }}" {{ $song->id == $review->song_id ? 'selected' : '' }}>
                        {{ $song->title }} - {{ $song->artist }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label>Nota (0-5):</label>
            <input type="number" name="rating" value="{{ $review->rating }}" step="0.1" min="0" max="5" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Resenha:</label>
            <textarea name="review" class="w-full border p-2 rounded">{{ $review->review }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Atualizar</button>
    </form>
@endsection --}}

@extends('layouts.app')

@section('title', 'Editar Avaliação')

@section('content')
    <div class="form-container bg-[var(--light-bg-color)] p-5 rounded-[var(--border-radius)] shadow-[var(--box-shadow)] max-w-lg mx-auto">
        <h1 class="text-3xl font-bold mb-5 text-[var(--text-color)]">Editar Avaliação</h1>
        <form method="POST" action="{{ route('reviews.update', $review) }}">
            @csrf @method('PUT')
            <label class="block mb-2 text-[var(--text-color)]">Música:</label>
            <select name="song_id" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]">
                @foreach ($songs as $song)
                    <option value="{{ $song->id }}" {{ $song->id == $review->song_id ? 'selected' : '' }}>
                        {{ $song->title }} - {{ $song->artist }}
                    </option>
                @endforeach
            </select>
            <label class="block mb-2 text-[var(--text-color)]">Nota (0-5):</label>
            <input type="number" name="rating" value="{{ $review->rating }}" step="0.1" min="0" max="5" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]" required>
            <label class="block mb-2 text-[var(--text-color)]">Resenha:</label>
            <textarea name="review" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]">{{ $review->review }}</textarea>
            <button type="submit" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-[var(--border-radius)] hover:bg-[#e55b40] hover:shadow-[var(--hover-shadow)] transition-all">Atualizar</button>
        </form>
    </div>
@endsection