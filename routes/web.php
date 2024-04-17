<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {

    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    $role = $user->role;
    return view('dashboard', compact('role'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/profil', function () {
    return view('profil');
})->middleware(['auth', 'verified'])->name('profil');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menu', function () {
    return view('menu1');
});

require __DIR__.'/auth.php';
