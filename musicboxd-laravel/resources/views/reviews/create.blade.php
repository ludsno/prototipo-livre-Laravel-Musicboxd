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

{{-- @extends('layouts.app')
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
@endsection --}}

@extends('layouts.app')

@section('title', 'Adicionar Avaliação')

@section('content')
    <div class="form-container bg-[var(--light-bg-color)] p-5 rounded-[var(--border-radius)] shadow-[var(--box-shadow)] max-w-lg mx-auto">
        <h1 class="text-3xl font-bold mb-5 text-[var(--text-color)]">Adicionar Avaliação</h1>
        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf
            <label class="block mb-2 text-[var(--text-color)]">Música:</label>
            <select name="song_id" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]">
                @foreach ($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->title }} - {{ $song->artist }}</option>
                @endforeach
            </select>
            <label class="block mb-2 text-[var(--text-color)]">Nota (0-5):</label>
            <input type="number" name="rating" step="0.1" min="0" max="5" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]" required>
            <label class="block mb-2 text-[var(--text-color)]">Resenha:</label>
            <textarea name="review" class="w-full p-2 mb-4 border border-gray-300 rounded-[var(--border-radius)]"></textarea>
            <button type="submit" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-[var(--border-radius)] hover:bg-[#e55b40] hover:shadow-[var(--hover-shadow)] transition-all">Enviar</button>
        </form>
    </div>
@endsection