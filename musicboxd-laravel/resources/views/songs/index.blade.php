<!DOCTYPE html>
<html>
<head>
    <title>Letterboxd de Música</title>
</head>
<body>
    <h1>Músicas</h1>
    <ul>
        @foreach ($songs as $song)
            <li>
                <a href="{{ route('songs.show', $song) }}">{{ $song->title }} - {{ $song->artist }}</a>
                ({{ $song->reviews->avg('rating') }} / 5)
            </li>
        @endforeach
    </ul>
    <a href="{{ route('reviews.create') }}">Adicionar Review</a>
</body>
</html>