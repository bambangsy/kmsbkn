<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    $role = Role::find($user->role_id);
    $role = $role->role;

    return view('dashboard', compact('role'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', function () {
        $user = Auth::user();
        $role = Role::find($user->role_id);
        $role = $role->role;
        if ($role == 'admin') {
            return view('admin.dbadmin', compact('role'));
        } else {
            return redirect('dashboard');
        }
    })->name('admin');

    Route::get('/kanban', function () {
        $user = Auth::user();
        $role = Role::find($user->role_id);
        $role = $role->role;
        if ($role == 'admin') {
            return view('admin.kanban', compact('role'));
        } else {
            return redirect('dashboard');
        }
    })->name('kanban');

    Route::get('/user-management', function () {
        $user = Auth::user();
        $role = Role::find($user->role_id);
        $role = $role->role;
        if ($role == 'admin') {
            return view('admin.user-management', compact('role'));
        } else {
            return redirect('dashboard');
        }
    })->name('user-management');

    Route::get('/knowledge-management', function () {
        $user = Auth::user();
        $role = Role::find($user->role_id);
        $role = $role->role;
        if ($role == 'admin') {
            return view('admin.knowledge-management', compact('role'));
        } else {
            return redirect('dashboard');
        }
    })->name('knowledge-management');

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
