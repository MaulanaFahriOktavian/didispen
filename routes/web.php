<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\DispensationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Satpam\DashboardController as SatpamDashboardController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| UI KIT (Development Only)
|--------------------------------------------------------------------------
*/
Route::get('/ui-kit', function () { 
    return view('ui-kit'); 
})->name('ui-kit');

/*
|--------------------------------------------------------------------------
| HOME / LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        return match($user->role) {
            'admin'  => redirect()->route('admin.dashboard'),
            'guru'   => redirect()->route('guru.dashboard'),
            'satpam' => redirect()->route('satpam.dashboard'),
            default  => redirect()->route('student.dashboard'),
        };
    }
    return redirect()->route('login');
})->name('home');

/*
|--------------------------------------------------------------------------
| PREMIUM LOGIN (Public - Siswa, Guru, Satpam)
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN (Hidden Route)
|--------------------------------------------------------------------------
*/
Route::get('/system-portal-admin', function () {
    return view('auth.admin-login');
})->name('admin.login')->middleware('guest:web');

Route::post('/system-portal-admin', [UserAuthController::class, 'adminLogin'])
    ->name('admin.login.process')
    ->middleware('guest:web');

/*
|--------------------------------------------------------------------------
| STUDENT AUTH
|--------------------------------------------------------------------------
*/
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'showLogin'])
        ->name('login.show')
        ->middleware('guest:student');

    Route::post('/login', [StudentAuthController::class, 'login'])
        ->name('login.process');

    Route::middleware('auth:student')->group(function () {
        Route::post('/logout', [StudentAuthController::class, 'logout'])
            ->name('logout');

        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('dashboard');

        // Dispensation Routes
        Route::get('/dispensations', [DispensationController::class, 'index'])
            ->name('dispensation.index');

        Route::get('/dispensations/create', [DispensationController::class, 'create'])
            ->name('dispensation.create');

        Route::post('/dispensations', [DispensationController::class, 'store'])
            ->name('dispensation.store');

        Route::get('/dispensations/{dispensation}', [DispensationController::class, 'show'])
            ->name('dispensation.show');
    });
});

/*
|--------------------------------------------------------------------------
| USER AUTH (Guru & Satpam)
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/login', [UserAuthController::class, 'showLogin'])
        ->name('login.show')
        ->middleware('guest');

    Route::post('/login', [UserAuthController::class, 'login'])
        ->name('login.process');

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [UserAuthController::class, 'logout'])
            ->name('logout');
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN (Protected Routes) - CONSOLIDATED
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:web', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Master Category
        Route::resource('categories', CategoryController::class);

        // Master Major (Jurusan)
        Route::resource('majors', MajorController::class);
        Route::post('majors/bulk-destroy', [MajorController::class, 'bulkDestroy'])->name('majors.bulk-destroy');
        Route::post('majors/bulk-restore', [MajorController::class, 'bulkRestore'])->name('majors.bulk-restore');
        Route::post('majors/{id}/restore', [MajorController::class, 'restore'])->name('majors.restore');

        // Master Classroom (Kelas)
        Route::resource('classrooms', ClassroomController::class);
        Route::post('classrooms/bulk-destroy', [ClassroomController::class, 'bulkDestroy'])->name('classrooms.bulk-destroy');
        Route::post('classrooms/bulk-restore', [ClassroomController::class, 'bulkRestore'])->name('classrooms.bulk-restore');
        Route::post('classrooms/{id}/restore', [ClassroomController::class, 'restore'])->name('classrooms.restore');
        
    });

/*
|--------------------------------------------------------------------------
| GURU (Protected Routes)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:web', 'role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])
            ->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| SATPAM (Protected Routes)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:web', 'role:satpam'])
    ->prefix('satpam')
    ->name('satpam.')
    ->group(function () {
        Route::get('/dashboard', [SatpamDashboardController::class, 'index'])
            ->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| GLOBAL LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::guard('web')->logout();
    Auth::guard('student')->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

require __DIR__.'/settings.php';