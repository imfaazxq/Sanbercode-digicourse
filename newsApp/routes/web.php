<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CastsController;
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