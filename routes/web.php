<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});


Route::get('/register', [PenggunaController::class, 'registerPage'])->name('page.register');
Route::get('/login', [PenggunaController::class, 'loginPage'])->name('page.login');
Route::post('/register', [PenggunaController::class, 'registerPengguna'])->name('user.register');
Route::post('/login', [PenggunaController::class, 'loginPengguna'])->name('user.login');
Route::post('/film/new-film', [FilmController::class, 'addNewFilm'])->name('film.newFilm');
Route::get('/all-film', [FilmController::class, 'getAllFilm'])->name('film.allFilm');
Route::post('/film/add-to-watchlist/{id_film}', [FilmController::class, 'addFilmToWatchList'])->name('film.addToWatchList');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('user.dashboard');

Route::get('/tambah-film', [PenggunaController::class, 'addFilm'])->name('user.tambah-film');
Route::delete('/film/{id_film}', [FilmController::class, 'deleteFilm'])->name('film.delete');
Route::post('/film/update-status/{id_film}', [FilmController::class, 'updateStatusFilm'])->name('film.updateStatus');
Route::delete('/watchlist/delete/{id_watchlist}', [FilmController::class, 'deleteWatchlist'])->name('watchlist.delete');
