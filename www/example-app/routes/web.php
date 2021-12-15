<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\WallController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# Route de base
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [WallController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::post('/postMessage', [WallController::class, 'postMessage'])->middleware(['auth']);

Route::get('/deleteMessage/{id}', [WallController::class, 'deleteMessage'])->middleware(['author'])->name('deleteMessage');

Route::get('/updateMessageForm/{id}', [WallController::class, 'updateMessageForm'])->middleware(['author'])->name('updateMessageForm');

Route::post('/updateMessage', [WallController::class, 'updateMessage'])->middleware(['auth'])->name('updateMessage');

Route::get('/films', [FilmController::class, 'all_films'])->middleware(['auth'])->name('all_films');

Route::get('/film/{id}', [FilmController::class, 'film'])->middleware(['auth'])->name('film');

Route::get('/genre/{id}/films', [FilmController::class, 'filmsByGenre'])->middleware(['auth'])->name('filmsByGenre');

Route::get('/distributeur/{id}/films', [FilmController::class, 'filmsByDistributeur'])->middleware(['auth'])->name('filmsByDistributeur');

Route::match(['get', 'post'], '/add_seance', [FilmController::class, 'add_seance'])->middleware(['auth'])->name('add_seance');



# Route de test
Route::get('/plop', function () {
    return 'plop';
});

Route::get('/print/{text}', function ($text) {
    return 'print' . $text;
});

# Route avec paramètre optionnel
Route::get('/hello/{name?}', function ($name = null) {
    return 'hello ' . $name;
});

require __DIR__ . '/auth.php';
