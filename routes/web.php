<?php

use Illuminate\Support\Facades\Route;

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
Route::put('/aves/{ave}', 'AveController@update')->name('aves.update');


