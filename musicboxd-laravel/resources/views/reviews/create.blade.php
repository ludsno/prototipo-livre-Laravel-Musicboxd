{{-- <h1>Adicionar Review</h1>
<form method="POST" action="{{ route('reviews.store') }}">
    @csrf
    <label>Música:</label>
    <select name="song_id">
        @foreach ($songs as $song)
            <option value="{{ $song->id }}">{{ $song->title }} - {{ $song->artist }}</option>
        @endforeach
    </select><br>
    <label>Nota (0-5):</label>
    <input type="number" name="rating" step="0.1" min="0" max="5" required><br>
    <label>Review:</label>
    <textarea name="review"></textarea><br>
    <input type="hidden" name="user_id" value="1"> <!-- Simulação, use autenticação depois -->
    <button type="submit">Enviar</button>
</form> --}}

@extends('layouts.app')
@section('content')
    <h1 class="text-2xl mb-4">Adicionar Avaliação</h1>
    <form method="POST" action="{{ route('reviews.store') }}" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label>Música:</label>
            <select name="song_id" class="w-full border p-2 rounded">
                @foreach ($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->title }} - {{ $song->artist }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label>Nota (0-5):</label>
            <input type="number" name="rating" step="0.1" min="0" max="5" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Resenha:</label>
            <textarea name="review" class="w-full border p-2 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Enviar</button>
    </form>
@endsection