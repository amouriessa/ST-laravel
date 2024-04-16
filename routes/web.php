<?php

use App\Http\Controllers\BroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bro', [BroController::class, 'index'])->name('bro.index');
    Route::post('/bro', [BroController::class, 'store'])->name('bro.store');
    Route::get('/bro/create', [BroController::class, 'create'])->name('bro.create');
    Route::get('/bro/{bro}/edit', [BroController::class, 'edit'])->name('bro.edit');
    Route::patch('/bro/{bro}', [BroController::class, 'update'])->name('bro.update');
    Route::delete('/bro/{bro}', [BroController::class, 'destroy'])->name('bro.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});

require __DIR__.'/auth.php';
