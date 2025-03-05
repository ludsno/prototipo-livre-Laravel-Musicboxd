<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     //
// }

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Requer login
    }

    public function index()
    {
        $reviews = Review::with(['user', 'song'])
            ->orderBy('date', 'desc')
            ->get();

        return view('home', compact('reviews'));
    }
}
