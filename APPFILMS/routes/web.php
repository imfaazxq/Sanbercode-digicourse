<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CastsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\ReviewsController;
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

Route::get('/', [IndexController::class,"index"]);
Route::get('/register', [BiodataController::class,"register"])->name('register');
Route::post('/home', [BiodataController::class,"home"]);
Route::get('/data-table', function(){
    return view ('pages.data-table');
});
Route::get('/table', function(){
    return view ('pages.table');
});

Route::middleware(['auth'])->group(function () {

// CRUD CASTS
// CREATE DATA
Route::get('Cast/create', [CastsController::class, "create"]);
Route::post('/Cast',[CastsController::class, "store"]);

// READ DATA
Route::get('/Cast',[CastsController::class, "index"]);
Route::get('/Cast/{casts_id}',[CastsController::class, "show"]);

// UPDATE DATA
Route::get('/Cast/{casts_id}/edit',[CastsController::class, "edit"]);
Route::put('/Cast/{casts_id}',[CastsController::class, "update"]);

// DELETE DATA
Route::delete('/Cast/{casts_id}',[CastsController::class, "destroy"]);

// GENRE CRUD
Route::get('genre/create', [GenresController::class, "create"]);
Route::post('/genre',[GenresController::class, "store"]);

Route::get('/genre',[GenresController::class, "index"]);
Route::get('/genre/{genre_id}',[GenresController::class, "show"]);

Route::get('/genre/{genre_id}/edit',[GenresController::class, "edit"]);
Route::put('/genre/{genre_id}',[GenresController::class, "update"]);

Route::delete('/genre/{genre_id}',[GenresController::class, "destroy"]);

Route::post('/reviews/{film_id}',[ReviewsController::class,"store"]);
});

//  FILM CRUD
Route::resource('film',FilmsController::class);

Route::get('/film/search', 'FilmController@search')->name('film.search');

Auth::routes();


