<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BiodataController;
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