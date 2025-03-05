<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class SongController extends Controller
// {
//     //
// }

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::with('reviews')->get();
        return view('songs.index', compact('songs'));
    }

    public function show(Song $song)
    {
        $song->load('reviews.user'); // Carrega reviews e seus autores
        return view('songs.show', compact('song'));
    }
}
