<?php

// #1

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ReviewController extends Controller
// {
//     //
// }

// #2
// namespace App\Http\Controllers;

// use App\Models\Review;
// use App\Models\Song;
// use Illuminate\Http\Request;

// class ReviewController extends Controller
// {
//     public function create()
//     {
//         $songs = Song::all();
//         return view('reviews.create', compact('songs'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'rating' => 'required|numeric|min:0|max:5',
//             'review' => 'nullable|string',
//             'song_id' => 'required|exists:songs,id',
//             'user_id' => 'required|exists:users,id', // Simule um usuário logado por enquanto
//         ]);

//         Review::create([
//             'rating' => $request->rating,
//             'review' => $request->review,
//             'date' => now(),
//             'user_id' => $request->user_id, // Substitua por auth()->id() com autenticação
//             'song_id' => $request->song_id,
//         ]);

//         return redirect('/songs');
//     }
// }

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Song;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReviewController extends Controller
{
    use AuthorizesRequests;
    public function create()
    {
        $songs = Song::all();
        return view('reviews.create', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|numeric|min:0|max:5',
            'review' => 'nullable|string',
            'song_id' => 'required|exists:songs,id',
        ]);

        Review::create([
            'rating' => $request->rating,
            'review' => $request->review,
            'date' => now(),
            'user_id' => auth()->id(),
            'song_id' => $request->song_id,
        ]);

        return redirect()->route('home');
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review); // Somente o autor pode editar
        $songs = Song::all();
        return view('reviews.edit', compact('review', 'songs'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);
        $request->validate([
            'rating' => 'required|numeric|min:0|max:5',
            'review' => 'nullable|string',
            'song_id' => 'required|exists:songs,id',
        ]);

        $review->update($request->only(['rating', 'review', 'song_id']));
        return redirect()->route('home');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();
        return redirect()->route('home');
    }
}