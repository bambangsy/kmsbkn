<?php

use App\Http\Controllers\AdminFrontPageController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursePathController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserKnowledgeController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\ValidatorKnowledgeController;
use App\Http\Controllers\UserCoursePathController;
use App\Http\Controllers\ValidatorCourseController;
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
    Route::get('/pengetahuan/{id}/{filter?}', [UserKnowledgeController::class, 'show'])->name('knowledge.show');
    Route::get('/pengetahuan/search/{search}', [UserKnowledgeController::class, 'search'])->name('pengetahuan.search');


    Route::resource('/alur-belajar', UserCoursePathController::class)->names([
        'index' => 'alur-belajar',
        'show' => 'alur-belajar.show',
        //'store' => 'admin.frontpage_management.store',
        //'destroy' => 'admin.frontpage_management.destroy',
        // 'edit' => 'admin.frontpage_management.edit',
        // 'update' => 'admin.frontpage_management.update'
    ]);
    Route::post('/alur-belajar/{id}/enroll', [UserCoursePathController::class,'enroll'])->name('alur-belajar.enroll');
    


    Route::get('/alur-belajar/search/{search}', [UserCoursePathController::class, 'search'])->name('alur-belajar.search');

    Route::get('/pelatihan', [UserCourseController::class, 'index'])->name('pelatihan');
    Route::get('/pelatihan/{id}', [UserCourseController::class, 'show'])->name('pelatihan.show');
    Route::post('/pelatihan/{id}/enroll', [UserCourseController::class, 'enroll'])->name('pelatihan.enroll')->middleware('auth');
    Route::get('/pelatihan/search/{search}', [UserCourseController::class, 'search'])->name('pelatihan.search');

    Route::get('/take-pelatihan', function () {
        return view('user/courses/take_courses');
    })->name('pelatihan.take_courses');

    Route::get('/take-pelatihan', function () {
        return view('user/courses/take_courses');
    })->name('pelatihan.take_courses');

    Route::get('/take-lesson', function () {
        return view('user/courses/take_lesson');
    })->name('pelatihan.take_lesson');
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

    Route::resource('/frontpage-management', AdminFrontPageController::class)->names([
        'index' => 'admin.frontpage_management',
        'create' => 'admin.frontpage_management.create',
        'store' => 'admin.frontpage_management.store',
        'destroy' => 'admin.frontpage_management.destroy',
        // 'edit' => 'admin.frontpage_management.edit',
        // 'update' => 'admin.frontpage_management.update'
    ]);

    Route::resource('/user-management', AdminUserController::class)->names([
        'index' => 'admin.user_management',
        'create' => 'admin.user_management.create',
        'store' => 'admin.user_management.store',
        'accept' => 'admin.user_management.accept',
        // 'edit' => 'admin.user_management.edit',
        // 'update' => 'admin.user_management.update'
    ]);
    Route::get('/user-management/{filter}', [AdminUserController::class, 'filter'])->name('admin.user_management.filter');
    Route::patch('/user-management/{id}/accept', [AdminUserController::class, 'accept'])->name('admin.user_management.accept');
    Route::patch('/user-management/{id}/declined', [AdminUserController::class,'declined'])->name('admin.user_management.declined');
    Route::post('/user-management/{id}/destroy', [AdminUserController::class,'destroy'])->name('admin.user_management.destroy');

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
    Route::patch('/validator/validasi/{id}/retrieve', [ValidatorKnowledgeController::class, 'retrieve'])->name('validasiknowledge.retrieve');
    Route::patch('/validator/validasi/{id}/cancel', [ValidatorKnowledgeController::class, 'cancel'])->name('validasiknowledge.cancel');

    Route::resource('/validator/pelatihan', ValidatorCourseController::class)->names([
        'index' => 'validasicourse',
        'create' => 'validasicourse.create',
        'store' => 'validasicourse.store',
        'destroy' => 'validasicourse.destroy',
        'edit' => 'validasicourse.edit',
        'update' => 'validasicourse.update'
    ]);
    Route::patch('/validator/pelatihan/{id}/approve', [ValidatorCourseController::class, 'approve'])->name('validasicourse.approve');
    Route::patch('/validator/pelatihan/{id}/reject', [ValidatorCourseController::class, 'reject'])->name('validasicourse.reject');
    Route::patch('/validator/pelatihan/{id}/retrieve', [ValidatorCourseController::class, 'retrieve'])->name('validasicourse.retrieve');
    Route::patch('/validator/pelatihan/{id}/cancel', [ValidatorCourseController::class, 'cancel'])->name('validasicourse.cancel');


    Route::get('/validasicoursepath', function () {
        return view('validator.coursepath.coursepath');
    })->name('validasicoursepath');
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

        'show' => 'course_path.show',
        'create' => 'course_path.create',
        'store' => 'course_path.store',
        'destroy' => 'course_path.destroy',
        'edit' => 'course_path.edit',
        'update' => 'course_path.update'
    ]);
    Route::post('/expert/alur-pelatihan/{id}/store_items', [CoursePathController::class, 'store_items'])->name('course_path.store_items');
    Route::patch('/expert/alur-pelatihan/{id}/validate', [CoursePathController::class, 'validate'])->name('course_path.validate');
    Route::patch('/expert/alur-pelatihan/{id}/cancel_validate', [CoursePathController::class, 'cancel_validate'])->name('course_path.cancel_validate');
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
