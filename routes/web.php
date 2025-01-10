<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Models\Movie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Jangan lupa import / use BookContoller
Route::get('/', function () {
    return view('master');
});

Route::resource('users', UserController::class);
Route::resource('movies', MovieController::class);
Route::resource('genres', GenreController::class);
Route::put('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');


