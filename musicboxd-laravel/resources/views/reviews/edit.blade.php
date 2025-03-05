@extends('layouts.app')
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
@endsection