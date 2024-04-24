<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursePathController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserKnowledgeController;
use App\Http\Controllers\ValidatorKnowledgeController;
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
        return view('admin/dbadmin', ['role' => $role]);
    } elseif ($role == "user") {
        return redirect('/');
    } elseif ($role == "expert") {
        return redirect(route('expert-dashboard'));
    } elseif ($role == "validator") {
        return redirect(route('validator-dashboard'));
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
        return view('validator_dashboard');
    })->name('validator-dashboard');
    Route::resource('/validator/validasi', ValidatorKnowledgeController::class)->names([
        'index' => 'validasiknowledge',
        'create' => 'validasiknowledge.create',
        'store' => 'validasiknowledge.store',
        'destroy' => 'validasiknowledge.destroy',
        'edit' => 'validasiknowledge.edit',
        'update' => 'validasiknowledge.update'
    ]);
    Route::patch('/validator/validasi/{id}/approve', [ValidatorKnowledgeController::class, 'approve'])->name('validasiknowledge.approve');
    Route::patch('/validator/validasi/{id}/reject', [ValidatorKnowledgeController::class, 'reject'])->name('validasiknowledge.reject');
    
});

Route::middleware(['auth', 'verified', 'role:expert'])->group(function () {
    Route::get('/expert/dashboard', function () {
        return view('dashboard');
    })->name('expert-dashboard');

    Route::resource('/dashboard/pengetahuan', KnowledgeController::class)->names([
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

    Route::resource('/expert/pelatihan', CourseController::class)->names([
        'index' => 'course',
        'create' => 'course.create',
        'store' => 'course.store',
        'destroy' => 'course.destroy',
        'edit' => 'course.edit',
        'update' => 'course.update'
    ]);

    Route::resource('/expert/alur-pelatihan', CoursePathController::class)->names([

        'create' => 'course_path.create',
        'store' => 'course_path.store',
        'destroy' => 'course_path.destroy',
        'edit' => 'course_path.edit',
        'update' => 'course_path.update'
    ]);

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
