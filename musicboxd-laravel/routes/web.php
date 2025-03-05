<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ReviewController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SearchController;

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
//     Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::resource('reviews', ReviewController::class)->middleware('auth');
//     Route::get('/search', [SearchController::class, 'index'])->name('search');
//     Route::resource('reviews', ReviewController::class)->middleware('auth');
//     Route::get('/profile', [ProfileController::class, 'show'])
//         ->middleware('auth')
//         ->name('profile.show');
// });

// require __DIR__ . '/auth.php';



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

// Rota da Home (pública ou autenticada, dependendo do HomeController)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rota do Dashboard (autenticada e verificada)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota de busca (pública, fora do grupo auth)
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Grupo de rotas autenticadas
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Reviews (CRUD completo)
    Route::resource('reviews', ReviewController::class);
});

// Rotas de autenticação do Breeze
require __DIR__ . '/auth.php';