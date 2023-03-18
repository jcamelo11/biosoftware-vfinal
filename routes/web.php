<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AveController;
use App\Http\Controllers\AvistamientoController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aves', [App\Http\Controllers\AveController::class, 'index'])->name('aves');
Route::get('/aves/create', [App\Http\Controllers\AveController::class, 'create'])->name('aves.create');
Route::post('/aves', [App\Http\Controllers\AveController::class, 'store'])->name('aves.store');
Route::get('/aves/{ave}/editar', [AveController::class, 'edit'])->name('aves.edit');
Route::put('/aves/{ave}', [AveController::class, 'update'])->name('aves.update');
Route::delete('/aves/{ave}', [AveController::class, 'destroy'])->name('aves.destroy');
Route::get('/aves/{ave}', [AveController::class, 'show'])->name('aves.show');


Route::post('/avistamientos', [App\Http\Controllers\AvistamientoController::class, 'store'])->name('avistamientos.store');




