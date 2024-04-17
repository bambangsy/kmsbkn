<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dbadmin');
    })->name('admin');

    Route::get('/kanban', function () {
        return view('kanban');
    })->name('kanban');
});

Route::middleware(['auth', 'verified','role:validator'])->group(function () {
    Route::get('/validator/dashboard', function () {
        return view('');
    })->name('');

    Route::get('/validator/manajemen-dokumen', function () {
        return view('');
    })->name('');
});

Route::middleware(['auth', 'verified','role:expert'])->group(function () {
    Route::get('/expert/dashboard', function () {
        return view('');
    })->name('');

    Route::get('/expert/pengetahuan', function () {
        return view('');
    })->name('');
    Route::get('/expert/help-desk', function () {
        return view('');
    })->name('');
    Route::get('/expert/rating', function () {
        return view('');
    })->name('');
});







Route::middleware('auth')->group(function () {
    return view('auth.login');
});

Route::get('/profil', function () {
    return view('profil');
})->middleware(['auth', 'verified'])->name('profil');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



