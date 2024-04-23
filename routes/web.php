<?php

use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserKnowledgeController ;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize\RoleMiddleware;

Route::get('/', function () {
    return view('user/home');
});

Route::get('/menus', function () {
    return view('menus');
});

Route::get('/user', function () {
    return view('user/home');
})->name('home');
Route::get('/alur-belajar', function () {
    return view('user/alur-belajar');
})->name('alur-belajar');
Route::get('/pelatihan', function () {
    return view('user/pelatihan');
})->name('pelatihan');
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/pengetahuan', [UserKnowledgeController::class, 'index'])->name('knowledge');
    Route::get('/pengetahuan/{id}', [UserKnowledgeController::class, 'show'])->name('knowledge.show');
});



Route::get('/dashboard', function () {
    $user = Auth::user();
    $role = $user->roles->first()->name;
    if ($role == "admin") {
        return view('admin/dbadmin');
    } elseif ($role == "user") {
        return redirect('/');
    } elseif ($role == "expert") {
        return view('dashboard');
    } elseif ($role == "validator") {
        return redirect('/');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
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

Route::middleware(['auth', 'verified', 'role:validator'])->group(function () {
    Route::get('/validator/dashboard', function () {
        return view('validator.dashboard');
    })->name('validator-dashboard');

    Route::get('/validator/manajemen-dokumen', function () {
        return view('validator.manajemen-dokumen');
    })->name('validator-manajemen-dokumen');
});

Route::middleware(['auth', 'verified', 'role:expert'])->group(function () {
    Route::resource('/dashboard/pelatihan', KnowledgeController::class)->names([
        'index' => 'knowledge',
        'create' => 'knowledge.create',
        'store' => 'knowledge.store',
        'destroy' => 'knowledge.destroy',
        'edit' => 'knowledge.edit',
        'update' => 'knowledge.update'
    ]);

    Route::get('/helpdesk', function () {
        return view('expert.helpdesk');
    })->name('helpdesk');

    Route::get('/rating', function () {
        return view('expert.rating');
    })->name('rating');

    Route::get('/course', function () {
        return view('expert.course.course');
    })->name('course');

    // Route::resource('/dashboard/course', KnowledgeController::class)->names([
    //     'index' => 'knowledge',
    //     'create' => 'knowledge.create',
    //     'store' => 'knowledge.store',
    //     'destroy' => 'knowledge.destroy',
    //     'edit' => 'knowledge.edit',
    //     'update' => 'knowledge.update'
    // ]);
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

require __DIR__ . '/auth.php';
