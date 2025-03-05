<h1>{{ $song->title }} - {{ $song->artist }}</h1>
<h2>Reviews</h2>
<ul>
    @foreach ($song->reviews as $review)
        <li>
            {{ $review->user->name }}: {{ $review->rating }}/5 - {{ $review->review }}
            ({{ $review->date->format('d/m/Y') }})
        </li>
    @endforeach
</ul>
<a href="{{ route('songs.index') }}">Voltar</a>