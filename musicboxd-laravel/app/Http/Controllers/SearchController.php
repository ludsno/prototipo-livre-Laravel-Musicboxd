<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class SearchController extends Controller
// {
//     //
// }

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $songs = Song::where('title', 'like', "%$query%")
            ->orWhere('artist', 'like', "%$query%")
            ->with('reviews')
            ->get();
        return view('search', compact('songs', 'query'));
    }
}
