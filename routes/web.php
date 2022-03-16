<?php

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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('shorten', [\App\Http\Controllers\HomeController::class, 'shortenUrl'])->name('url.shorten');
    Route::get('{url}', [\App\Http\Controllers\HomeController::class, 'redirectToDestination'])->name('url.redirect');
});
