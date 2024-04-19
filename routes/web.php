<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize\RoleMiddleware;

Route::get('/', function () {
    return view('layouts/user');
});


Route::get('/user', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dbadmin');
    })->name('admin');

    Route::get('/kanban', function () {
        return view('admin.kanban');
    })->name('admin-kanban');

    Route::get('/user-management', function () {
        return view('admin.user-management');
    })->name('admin-user-management');

    Route::get('/knowledge-management', function () {
        return view('admin.knowledge-management');
    })->name('admin-knowledge-management');
});

Route::middleware(['auth', 'verified','role:validator'])->group(function () {
    Route::get('/validator/dashboard', function () {
        return view('validator.dashboard');
    })->name('validator-dashboard');

    Route::get('/validator/manajemen-dokumen', function () {
        return view('validator.manajemen-dokumen');
    })->name('validator-manajemen-dokumen');
});

Route::middleware(['auth', 'verified','role:expert'])->group(function () {
    Route::get('/expert/dashboard', function () {
        return view('expert.dashboard');
    })->name('expert-dashboard');
    Route::get('/expert/pengetahuan', function () {
        return view('expert.pengetahuan');
    })->name('expert-pengetahuan');
    Route::get('/expert/helpdesk', function () {
        return view('expert.helpdesk');
    })->name('expert-helpdesk');
    Route::get('/expert/rating', function () {
        return view('expert.rating');
    })->name('xpert-rating');
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



