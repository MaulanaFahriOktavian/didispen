<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\DispensationController;

use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::view('/', 'welcome')->name('home');

/*
|--------------------------------------------------------------------------
| STUDENT
|--------------------------------------------------------------------------
*/

Route::prefix('student')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('student.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('student.login.process');

    Route::middleware('auth:student')->group(function () {

        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('student.dashboard');

        Route::get('/dispensation/create', [DispensationController::class, 'create'])
            ->name('student.dispensation.create');

        Route::post('/dispensation', [DispensationController::class, 'store'])
            ->name('student.dispensation.store');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('student.logout');

        Route::get('/dispensations', [DispensationController::class,'index'])
            ->name('student.dispensation.index');
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

});

require __DIR__.'/settings.php';